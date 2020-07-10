<?php

namespace App\Http\Controllers;

use App\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class JenisSuratController extends Controller
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
        $surat = JenisSurat::all();

        return view('operator/jenissurat.index',['surat'=>$surat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = new JenisSurat();

        $request = (object) $surat->getDefaultValues();

        return view('operator/jenissurat.form',[
            'request' => $request
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
        //data from form
        $data = [
            'jenis' => $request->jenisSurat,
        ];

        //validation start
        $message = [
            'jenis.required' => 'Jenis Surat Wajib Diisi',
            'jenis.unique' => 'Jenis Surat Sudah Ada',
        ];

        $validate = Validator::make($data,[
            'jenis' => 'required | unique:jenis_surat,jenis'
        ], $message);

        if($validate->fails()){
            return redirect('operator/data-surat/create')
            ->withErrors($validate)
            ->withInput();
        }

        $insertSurat = JenisSurat::create($data);

        if($insertSurat){
            return redirect('operator/data-surat')->with('success','Data Surat Berhasil Tersimpan');
        }else{
            return redirect('operator/data-surat')->with('error','Terjadi Kesalahan Saat Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $findSurat = JenisSurat::where('id',$id)->get();

        // return view('operator/jenissurat.dataModal', ['selectSurat' => $findSurat])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratFind = JenisSurat::findOrFail($id);

        $request = (object) $suratFind;

        return view('operator/jenissurat.form',[
            'suratFind' => $suratFind,
            'request' => $request
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat = new JenisSurat();

        $data = [
            'jenis' => $request->jenisSurat,
        ];

        $update = $surat::where('id',$id)
                    ->update($data);

        if($update){
            return redirect('operator/data-surat')->with('success','Data Surat Berhasil Diperbaharui');
        }else{
            return redirect('operator/data-surat')->with('error','Terjadi Kesalahan Saat Memperbaharui Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisSurat  $jenisSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = new JenisSurat();

        $destroy = $surat::where('id',$id)->delete();

        if($destroy){
            return redirect('operator/data-surat')->with('success','Data Surat Berhasil Dihapus');
        }else{
            return redirect('operator/data-surat')->with('error','Terjadi Kesalahan saat Penghapusan');
        }
    }
}
