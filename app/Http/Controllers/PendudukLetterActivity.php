<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\JenisSurat;
use Carbon\Carbon;

class PendudukLetterActivity extends Controller
{
    public function LetterTracking(){
        $getPenduduk = DB::table('penduduk')
                        ->where('NIK',\Auth::user()->NIK)
                        ->first();

        $selectKeluarga = DB::table('penduduk')
                            ->where('noKK',$getPenduduk->noKK)
                            ->get();

        $selectSurat = JenisSurat::all();

        $getLatestLetter = DB::table('pengajuan_surat')
                            ->where('NIK',\Auth::user()->NIK)
                            ->orderByDesc('noSurat')
                            ->first();

        $getAllLetter = DB::table('pengajuan_surat')
                            ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                            ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                            ->select(
                                'penduduk.nama as namaPenduduk',
                                'penduduk.noKK as nomerKK',
                                'pengajuan_surat.*',
                                'jenis_surat.jenis as jenisSurat',
                            )
                            ->Where('penduduk.noKK',$getPenduduk->noKK)
                            ->orderByDesc('pengajuan_surat.created_at')
                            ->get();

        return view('penduduk/data-surat.letter-tracking',[
            'surat' => $selectSurat,
            // 'letterTracking' => $letterTracking,
            'allLetter' => $getAllLetter,
        ]);
    }

    public function LetterFilter($id){

        $noSurat = $id;

        $letterTracking = DB::table('pengajuan_surat')
                            ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                            ->select(
                                'penduduk.nama as namaPenduduk',
                                'penduduk.noKK as nomerKK',
                                'pengajuan_surat.*'
                            )
                            ->Where('pengajuan_surat.noSurat',$id)
                            ->get();

        return view('penduduk/data-surat.fetchData',['letterTracking'=> $letterTracking])->render();
    }

    public function letterHistory(){
        return view('penduduk/data-surat.jurnalSurat');
    }

    public static function indonesianFormattedDate($date) {
        setlocale(LC_TIME, 'nl_NL.utf8');
        $dt = new  \Carbon\Carbon($date);
        // setlocale(LC_TIME, 'Indonesia');


        return $dt->formatLocalized('%e %B %Y'); // 3 September 2018
    }
}
