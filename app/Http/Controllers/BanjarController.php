<?php

namespace App\Http\Controllers;

use App\Banjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BanjarController extends Controller
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
        $banjar = Banjar::all();

        return view('operator/banjar.index',['banjar' => $banjar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banjar = new Banjar();

        $request =  (object) $banjar->getDefaultValues();

        $findPenduduk = DB::table('penduduk')
                        ->whereNotIn('NIK',[DB::raw('SELECT NIK from kelian_banjar_dinas')])
                        ->get();

        return view('operator/banjar.form', [
            'request' => $request,
            'findPenduduk' => $findPenduduk
        ]);

        // dd($findPenduduk);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'namaBanjar' => $request->namaBanjar,
            'alamatBanjar' => $request->alamatBanjar,
            'keteranganBanjar' => $request->keteranganBanjar,
        ];

        $message = [
            'namaBanjar.required' => 'Nama Banjar Wajib Diisi',
            'alamatBanjar.required' => 'Alamat Banjar Wajib Diisi',
        ];

        $validate = Validator::make($data,[
            'namaBanjar' => 'required',
            'alamatBanjar' => 'required',
        ],$message);

        if($validate->fails()){
            return redirect('operator/banjar/create')
                    ->withErrors($validate)
                    ->withInput();
        }

        $insertBanjar = Banjar::create([
            'nama' => $request->namaBanjar,
            'alamat' => $request->alamatBanjar,
            'keterangan' => $request->keteranganBanjar,
        ]);

        return redirect('operator/banjar')->with('success','Data Banjar Berhasil Tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $findBanjar = Banjar::findOrFail($id)->first();

        // $findBanjar = Banjar::where('id',$id)->get();
        $findBanjar = DB::table('banjar')
                        ->join('kelian_banjar_dinas','kelian_banjar_dinas.idBanjar','=','banjar.id')
                        ->join('penduduk','kelian_banjar_dinas.NIK','=','penduduk.NIK')
                        ->select('banjar.nama as namabanjar','banjar.alamat','banjar.keterangan','penduduk.nama as namakelian','kelian_banjar_dinas.noTelp')
                        ->where('banjar.id',$id)
                        ->get();

        $request =  (object) $banjar->getDefaultValues();

        // dd($findBanjar);
        return view('operator/banjar.dataModal', [
            'selectBanjar' => $findBanjar,
            'request' => $request,
        ])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banjarFind = Banjar::findOrFail($id);

        $findKelian = DB::table('penduduk')
                        ->join('kelian_banjar_dinas','kelian_banjar_dinas.NIK','=','penduduk.NIK')
                        ->select('penduduk.*','kelian_banjar_dinas.noTelp')
                        ->where('kelian_banjar_dinas.idBanjar',$id)
                        ->get();

        $findPenduduk = DB::table('penduduk')
                        ->whereNotIn('NIK',[DB::raw('SELECT NIK from kelian_banjar_dinas')])
                        ->get();

        $request = (object) $banjarFind;

        $requestKelian = (object) $findKelian;

        // dd($requestKelian);

        return view('operator/banjar.form', [
            'banjarFind' => $banjarFind,
            'request' => $request,
            'requestKelian' => $requestKelian,
            'findPenduduk' => $findPenduduk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banjar = new Banjar();

        $data = [
            'nama' => $request->namaBanjar,
            'alamat' => $request->alamatBanjar,
            'keterangan' => $request->keteranganBanjar,
        ];

        $update = $banjar::where('id',$id)
                    ->update($data);

        return redirect('operator/banjar')->with('success','Data Banjar Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banjar = new Banjar();

        $destroy = $banjar::where('id',$id)->delete();

        if($destroy){
            return redirect('operator/banjar')->with('success','Data Banjar Berhasil Dihapus');
        }else{
            return redirect('operator/banjar')->with('error','Terjadi Kesalahan saat penghapusan');
        }

    }
}
