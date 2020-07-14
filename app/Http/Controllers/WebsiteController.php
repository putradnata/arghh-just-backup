<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WebsiteContent;

class WebsiteController extends Controller
{

    public function index(){
        $getContent = WebsiteContent::first();

        $countPenduduk = DB::table('Penduduk')
                        ->where('statusPenduduk','A')
                        ->count();

        $countPendudukMale = DB::table('Penduduk')
                        ->where('statusPenduduk','A')
                        ->where('jenisKelamin','L')
                        ->count();

        $countPendudukFemale = DB::table('Penduduk')
                        ->where('statusPenduduk','A')
                        ->where('jenisKelamin','P')
                        ->count();

        $countPendudukFemale = DB::table('Penduduk')
                        ->where('statusPenduduk','A')
                        ->where('jenisKelamin','P')
                        ->count();

        $countKepalaKeluarga = DB::table('Penduduk')
                        ->where('statusPenduduk','A')
                        ->where('kedudukanKeluarga','KK')
                        ->count();

        $countBanjar = DB::table('banjar')
                        ->where('deleted_at',null)
                        ->count();

        return view('website.index',[
            'content' => $getContent,
            'totalPenduduk' => $countPenduduk,
            'laki' => $countPendudukMale,
            'perempuan' => $countPendudukFemale,
            'kepalaKeluarga' => $countKepalaKeluarga,
            'banjar'=>$countBanjar,
        ]);
    }

    public function searchLetter(){
        $getContent = WebsiteContent::first();

        $letterTracking = null;

        return view('website.search-letter',[
            'content' => $getContent,
            'letterTracking' => $letterTracking,
        ]);
    }

    public function findLetter(Request $request){
        $getContent = WebsiteContent::first();

        $noSurat = $request->nomerSurat;

        $getLetters = DB::table('pengajuan_surat')
                        ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                        ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                        ->select(
                            'penduduk.nama as namaPenduduk',
                            'penduduk.noKK as nomerKK',
                            'pengajuan_surat.*',
                            'jenis_surat.jenis as jenisSurat',
                        )
                        ->Where('noSurat',$noSurat)
                        ->orderByDesc('pengajuan_surat.created_at')
                        ->get();

        if(count($getLetters) === 0){
            return redirect('lacak-surat/#visimisi')->with('error','Surat Tidak Terdaftar');
        }

        // dd($getLetters);

        return view('website.search-letter',[
            'content' => $getContent,
            'letterTracking' => $getLetters,
        ]);
    }
}
