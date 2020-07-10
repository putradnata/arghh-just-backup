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
}
