<?php

namespace App\Http\Controllers;

use App\PendudukPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendudukPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $selectPendudukPindah = DB::table('penduduk')
                                    ->join('penduduk_pindah','penduduk.NIK','penduduk_pindah.NIK')
                                    ->join('banjar','penduduk.idBanjar','banjar.id')
                                    ->select(
                                        'penduduk.*',
                                        'banjar.nama as namaBanjar',
                                        'penduduk_pindah.alasanPindah',
                                        'penduduk_pindah.alamatPindah',
                                        'penduduk_pindah.padaTanggal as tanggalPindah',
                                        'penduduk_pindah.tanggalLapor'
                                        )
                                    ->where('penduduk.StatusPenduduk','P')
                                    ->groupBy('penduduk.noKK')
                                    ->get();

        return view('operator/kependudukan/penduduk-pindah.index',[
            'pendudukPindah' => $selectPendudukPindah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $findPenduduk = DB::table('penduduk')
                        ->where('statusPenduduk','A')
                        ->get();

        return view('operator/kependudukan/penduduk-pindah.form',[
            'penduduk' => $findPenduduk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $data = [
            'NIK' => $request->namaLengkap,
            'noKK' => $request->noKK,
            'alasanPindah' => $request->alasanPindah,
            'alamatPindah' => $request->alamatPindah,
            'padaTanggal' => $request->tanggalPindah,
            'tanggalLapor' => \Carbon\Carbon::now()->format('Y-m-d'),
            'created_at' => \Carbon\Carbon::now(),
        ];


        $insertPindah = DB::table('penduduk_pindah')
                            ->insert($data);

        if($insertPindah){

            $updateFirst = DB::table('penduduk')
                                ->where('NIK',$request->namaLengkap)
                                ->update([
                                    'statusPenduduk' => 'P',
                                ]);

            if($updateFirst){
                $pengikut = $request->pindah;

                for($x=0; $x<count($pengikut); $x++){
                    $insertData = DB::table('penduduk_pindah')
                                    ->insert([
                                        'NIK' => $pengikut[$x],
                                        'noKK' => $request->noKK,
                                        'alasanPindah' => $request->alasanPindah,
                                        'alamatPindah' => $request->alamatPindah,
                                        'padaTanggal' => $request->tanggalPindah,
                                        'tanggalLapor' => \Carbon\Carbon::now()->format('Y-m-d'),
                                        'created_at' => \Carbon\Carbon::now(),
                                    ]);
                }

                if($insertData){
                    for($x=0; $x<count($pengikut); $x++){
                        $updatePengikut = DB::table('penduduk')
                                        ->where('NIK',$pengikut[$x])
                                        ->update([
                                            'statusPenduduk' => 'P'
                                        ]);
                    }

                    if($updatePengikut){
                        return redirect('operator/penduduk-pindah')->with('success','Data Berhasil Ditambahkan');
                    }
                }
            }

        }else{
            return redirect('/operator/penduduk-pindah.index')->with('error','Terjadi Kesalahan Saat Menambah Data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PendudukPindah  $pendudukPindah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getnoKK = DB::table('penduduk')
                        ->where('NIK',$id)
                        ->first();

        $detailPendudukPindah = DB::table('penduduk')
                        ->join('penduduk_pindah','penduduk.NIK','=','penduduk_pindah.NIK')
                        ->join('banjar','penduduk.idBanjar','=','banjar.id')
                        ->select(
                            'penduduk.*',
                            'penduduk_pindah.alasanPindah',
                            'penduduk_pindah.padaTanggal as tanggalPindah',
                            'penduduk_pindah.tanggalLapor',
                            'penduduk_pindah.alamatPindah',
                            'banjar.nama as namaBanjar'
                        )
                        ->where('penduduk_pindah.NIK',$id)
                        ->get();

        $detailPengikutPindah = DB::table('penduduk')
                                    ->join('penduduk_pindah','penduduk.NIK','=','penduduk_pindah.NIK')
                                    ->join('banjar','penduduk.idBanjar','=','banjar.id')
                                    ->select(
                                        'penduduk.*',
                                        'penduduk_pindah.alasanPindah',
                                        'penduduk_pindah.padaTanggal as tanggalPindah',
                                        'penduduk_pindah.tanggalLapor',
                                        'penduduk_pindah.alamatPindah',
                                        'banjar.nama as namaBanjar'
                                    )
                                    ->where('penduduk_pindah.noKK',$getnoKK->noKK)
                                    ->whereNotIn('penduduk_pindah.NIK',[$id])
                                    ->get();

        return view('operator/kependudukan/penduduk-pindah.fetchDetail',[
            'fetched' => $detailPendudukPindah,
            'fetchPengikut' => $detailPengikutPindah,
        ])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PendudukPindah  $pendudukPindah
     * @return \Illuminate\Http\Response
     */
    public function edit(PendudukPindah $pendudukPindah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PendudukPindah  $pendudukPindah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendudukPindah $pendudukPindah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PendudukPindah  $pendudukPindah
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendudukPindah $pendudukPindah)
    {
        //
    }

    public static function indonesianFormattedDate($date) {
        $dt = new  \Carbon\Carbon($date);
        setlocale(LC_TIME, 'IND');

        return $dt->formatLocalized('%e %B %Y'); // 3 September 2018
    }

    public function showPengikut($id){
        $getnoKK = DB::table('penduduk')
                        ->where('NIK',$id)
                        ->first();

        $pengikut = DB::table('penduduk')
                        ->where('noKK',$getnoKK->noKK)
                        ->where('statusPenduduk','A')
                        ->whereNotIn('NIK',[$id])
                        ->get();

        return view('/operator/kependudukan/penduduk-pindah.fetchPengikut',[
            'fetched' => $pengikut,
        ])->render();
    }
}
