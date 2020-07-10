<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profilPenduduk(){
        $selectUser = DB::table('users')
                        ->join('penduduk','users.NIK','=','penduduk.NIK')
                        ->select(
                                'users.NIK as NIKUser',
                                'penduduk.nama as namaPenduduk',
                                'penduduk.noKK as noKKPenduduk',
                                'penduduk.jenisKelamin as jenisKelaminPenduduk',
                                'penduduk.statusPerkawinan as statusPerkawinanPenduduk',
                                'penduduk.idBanjar as banjarPenduduk',
                                )
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        $noKKuser = $selectUser[0]->noKKPenduduk;
        $NIKuser = $selectUser[0]->NIKUser;

        $selectKeluargaPenduduk = DB::table('penduduk')
                                ->where('noKK',$noKKuser)
                                ->orderByRaw("FIELD(kedudukanKeluarga , 'KK','I','AK','OT','FL')")
                                ->get();

        $selectSuratPenduduk = DB::table('pengajuan_surat')
                                ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                                ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                                ->select(
                                    'pengajuan_surat.*',
                                    'penduduk.noKK as noKKPenduduk',
                                    'penduduk.nama as namaPenduduk',
                                    'jenis_surat.jenis as jenisSurat',
                                )
                                ->where('penduduk.noKK',$noKKuser)
                                ->orderByDesc('pengajuan_surat.noSurat')
                                ->paginate(2);

        $countWOLimit = DB::table('pengajuan_surat')
                                ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                                ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                                ->select(
                                    'pengajuan_surat.*',
                                    'penduduk.noKK as noKKPenduduk',
                                    'penduduk.nama as namaPenduduk',
                                    'jenis_surat.jenis as jenisSurat',
                                )
                                ->where('penduduk.noKK',$noKKuser)
                                ->orderByDesc('pengajuan_surat.noSurat')
                                ->count();

        return view('penduduk.profile',[
            'dataUser' => $selectUser,
            'keluargaUser' => $selectKeluargaPenduduk,
            'dataSurat' => $selectSuratPenduduk,
            'jumlahSurat' => $countWOLimit,
        ]);
    }

    public static function indonesianFormattedDate($date) {
        $dt = new  \Carbon\Carbon($date);
        setlocale(LC_TIME, 'IND');

        return $dt->formatLocalized('%e %B %Y'); // 3 September 2018
    }
}
