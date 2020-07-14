<?php

namespace App\Http\Controllers;

use App\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PengajuanSuratController extends Controller
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
        $incomingLetter = PengajuanSurat::where('status','-1')
                            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'fileKK.required' => 'File KK Wajib Di Upload',
            'fileKK.mimes' => 'File Harus Berupa JPG, PNG, JPEG, atau PDF',
            'keperluan.required' => 'Keperluan Wajib Diisi',
            'suratDiajukan.required' => 'Surat Wajib Diisi',
        ];

        $request->validate([
            'fileKK' => 'required|mimes:jpeg,png,jpg,pdf|max:4096',
            'keperluan'=> 'required',
            'suratDiajukan'=>'required'
        ],$messages);

        //get nik
        $nik = $request->pemohon;

        //find penduduk
        $findPenduduk = DB::table('penduduk')
                        ->where('NIK',$nik)
                        ->first();

        //find banjar
        $findBanjar = DB::table('banjar')
                    ->where('id',$findPenduduk->idBanjar)
                    ->first();

        //get current month
        $now = Carbon::now()->toDateString();
        $m = explode('-',$now);
        $month = $m[1];

        //Normal number to Roman number conversion
        $normalNumber = array('01','02','03','04','05','06','07','08','09','10','11','12');
        $romanNumber = array('I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');

        $conversion = str_ireplace($normalNumber,$romanNumber,$month);

        //get banjar's initial
        if($findBanjar->id == '1'){
            $banjarInitial = 'TK';
        }else if($findBanjar->id == '2'){
            $banjarInitial = 'SM';
        }else if($findBanjar->id == '3'){
            $banjarInitial = 'KB';
        }else if($findBanjar->id == '4'){
            $banjarInitial = 'PK';
        }else if($findBanjar->id == '5'){
            $banjarInitial = 'PND';
        }else if($findBanjar->id == '6'){
            $banjarInitial = 'LBH';
        }

        $fileKK = $request->file('fileKK');

        $fileKKName = time()."_"."KK"."-".$nik.".".$request->fileKK->extension();

        //check has letter or not | backup original | this one check for every single nik
        // $checkLetter = DB::table('pengajuan_surat')
        //                 ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
        //                 ->select(
        //                     'penduduk.nama as namaPenduduk',
        //                     'penduduk.noKK as nomerKK',
        //                     'pengajuan_surat.*'
        //                 )
        //                 ->where('penduduk.NIK',\Auth::user()->NIK)
        //                 ->get();

            $checkLetter = DB::table('pengajuan_surat')
                        ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                        ->select(
                            'penduduk.nama as namaPenduduk',
                            'penduduk.noKK as nomerKK',
                            'pengajuan_surat.*'
                        )
                        ->orderBy('created_at','DESC')
                        ->first();

            $findLatestLetter = DB::table('pengajuan_surat')
                                ->select('noSurat',DB::raw('MAX(noSurat)'))
                                ->where('noSurat','like','%' .$banjarInitial. '%')
                                ->where('noSurat','like','%-' .$conversion. '-%')
                                ->groupBy('noSurat')
                                ->orderByDesc('noSurat')
                                ->first();

            $noUrut = substr($findLatestLetter->noSurat,0,3);
            $maxid=explode("-",$findLatestLetter->noSurat);
            $noUrut = $maxid[0];
            $noUrut++;

            $newLetterNumber = sprintf('%03s',$noUrut).'-'.$banjarInitial.'-'.$conversion.'-'.$m[0];

        if(empty($checkLetter)){

            $newLetterNumber = '001'.'-'.$banjarInitial.'-'.$conversion.'-'.$m[0];

            $data = [
                'noSurat' => $newLetterNumber,
                'NIK' => $nik,
                'idJenisSurat' => $request->suratDiajukan,
                'idBanjar' => $findBanjar->id,
                'keperluan' => $request->keperluan,
                'status' => '-1',
                'pathKK' => $fileKKName,
            ];

             //get if letter = sktu
            $validateSKTU = $request->sktu;

            if($validateSKTU){
                $dataUsaha = [
                    'NIKPemilik' => $nik,
                    'nama' => $request->namaUsaha,
                    'jenisUsaha' => $request->jenisUsaha,
                    'alamat' => $request->alamatUsaha,
                    'created_at' => \Carbon\Carbon::now()
                ];

                $insert = PengajuanSurat::create($data);

                $insertUsaha = DB::table('usaha')
                                ->insert($dataUsaha);

                if($insert && $insertUsaha){
                    $fileKK->move('files',$fileKKName);
                    return redirect('penduduk')->with('success','Surat Berhasil Diajukan dengan Nomor Surat '.$newLetterNumber.'Anda Dapat Melacak Surat Pada Halaman Utama Tanpa Harus Masuk Pada Sistem');
                }else{
                    return redirect('penduduk')->with('error','Terjadi Kesalahan Saat Mengajukan Surat');
                }

            }else{

                $insert = PengajuanSurat::create($data);

                if($insert){
                    $fileKK->move('files',$fileKKName);
                    return redirect('penduduk')->with('success','Surat Berhasil Diajukan dengan Nomor Surat'.$newLetterNumber.'Anda Dapat Melacak Surat Pada Halaman Utama Tanpa Harus Masuk Pada Sistem');
                }else{
                    return redirect('penduduk')->with('error','Terjadi Kesalahan Saat Mengajukan Surat');
                }
            }

        }else{
            //count how many letter in database
            $findLatestLetter = DB::table('pengajuan_surat')
                                ->select('noSurat',DB::raw('MAX(noSurat)'))
                                ->where('noSurat','like','%' .$banjarInitial. '%')
                                ->where('noSurat','like','%-' .$conversion. '-%')
                                ->groupBy('noSurat')
                                ->orderByDesc('noSurat')
                                ->first();

            $noUrut = substr($findLatestLetter->noSurat,0,3);
            $maxid=explode("-",$findLatestLetter->noSurat);
            $noUrut = $maxid[0];
            $noUrut++;

            $newLetterNumber = sprintf('%03s',$noUrut).'-'.$banjarInitial.'-'.$conversion.'-'.$m[0];

            $data = [
                'noSurat' => $newLetterNumber,
                'NIK' => $nik,
                'idJenisSurat' => $request->suratDiajukan,
                'idBanjar' => $findBanjar->id,
                'status' => '-1',
                'keperluan' => $request->keperluan,
                'pathKK' => $fileKKName,
            ];

             //get if letter = sktu
            $validateSKTU = $request->sktu;

            if($validateSKTU){
                $dataUsaha = [
                    'NIKPemilik' => $nik,
                    'nama' => $request->namaUsaha,
                    'jenisUsaha' => $request->jenisUsaha,
                    'alamat' => $request->alamatUsaha,
                    'created_at' => \Carbon\Carbon::now()
                ];

                $insert = PengajuanSurat::create($data);

                $insertUsaha = DB::table('usaha')
                                ->insert($dataUsaha);

                if($insert && $insertUsaha){
                    $fileKK->move('files',$fileKKName);
                    return redirect('penduduk')->with('success','Surat Berhasil Diajukan dengan Nomor Surat'.$newLetterNumber.'Anda Dapat Melacak Surat Pada Halaman Utama Tanpa Harus Masuk Pada Sistem');
                }else{
                    return redirect('penduduk')->with('error','Terjadi Kesalahan Saat Mengajukan Surat');
                }

            }else{
                $insert = PengajuanSurat::create($data);

                if($insert){
                    $fileKK->move('files',$fileKKName);
                    return redirect('penduduk')->with('success','Surat Berhasil Diajukan dengan Nomor Surat '.$newLetterNumber.'Anda Dapat Melacak Surat Pada Halaman Utama Tanpa Harus Masuk Pada Sistem');
                }else{
                    return redirect('penduduk')->with('error','Terjadi Kesalahan Saat Mengajukan Surat');
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PengajuanSurat  $pengajuanSurat
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengajuanSurat  $pengajuanSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengajuanSurat  $pengajuanSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengajuanSurat  $pengajuanSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanSurat $pengajuanSurat)
    {
        //
    }
}
