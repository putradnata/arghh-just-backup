<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PDF;

class OperatorLetterActivity extends Controller
{
    public function incomingLetter(){
        //current date
        $today = \Carbon\Carbon::now()->format('Y-m-d');

        $incomingLetter = DB::table('pengajuan_surat')
                            ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                            ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                            ->join('banjar','pengajuan_surat.idBanjar','=','banjar.id')
                            ->select(
                                'pengajuan_surat.noSurat',
                                'penduduk.nama as Pemohon',
                                'banjar.nama as Banjar',
                                'jenis_surat.jenis as JenisSurat',
                                'pengajuan_surat.created_at as tanggalMengajukan',
                                'pengajuan_surat.status as statusSurat',
                            )
                            ->where('pengajuan_surat.created_at','like','%'.$today.'%')
                            ->orderByDesc('pengajuan_surat.created_at')
                            ->get();

        //dd($incomingLetter->toSql(),$incomingLetter->getBindings());

        // dd($incomingLetter);

        return view('operator/manajemen-surat.index',[
            'incomingLetter' => $incomingLetter,
        ]);
    }

    public function OperatorProcess($id){
        $operatorProcess = DB::table('pengajuan_surat')
                                    ->where('noSurat',$id)
                                    ->update(['status' => 'D']);

        if($operatorProcess){
            return redirect('operator/surat-masuk')->with('success','Status Berhasil Diperbaharui');
        }else{
            return redirect('operator/surat-masuk')->with('error','Terjadi Kesalahan');
        }
    }

    public function KelianBanjarProcess($id){
        $operatorProcess = DB::table('pengajuan_surat')
                                    ->where('noSurat',$id)
                                    ->update(['status' => 'KBD']);

        if($operatorProcess){
            return redirect('operator/surat-masuk')->with('success','Status Berhasil Diperbaharui');
        }else{
            return redirect('operator/surat-masuk')->with('error','Terjadi Kesalahan');
        }
    }

    public function KepalaDesaProcess($id){
        $operatorProcess = DB::table('pengajuan_surat')
                                    ->where('noSurat',$id)
                                    ->update(['status' => 'KD']);

        if($operatorProcess){
            return redirect('operator/surat-masuk')->with('success','Status Berhasil Diperbaharui');
        }else{
            return redirect('operator/surat-masuk')->with('error','Terjadi Kesalahan');
        }
    }

    public function CompletedProcess($id){
        $operatorProcess = DB::table('pengajuan_surat')
                                    ->where('noSurat',$id)
                                    ->update(['status' => 'S']);

        if($operatorProcess){
            return redirect('operator/surat-masuk')->with('success','Status Berhasil Diperbaharui');
        }else{
            return redirect('operator/surat-masuk')->with('error','Terjadi Kesalahan');
        }
    }

    public function agenda(){
        $agenda = DB::table('pengajuan_surat')
                            ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                            ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                            ->join('banjar','pengajuan_surat.idBanjar','=','banjar.id')
                            ->select(
                                'pengajuan_surat.noSurat',
                                'penduduk.nama as Pemohon',
                                'banjar.nama as Banjar',
                                'jenis_surat.jenis as JenisSurat',
                                'pengajuan_surat.created_at as tanggalMengajukan',
                                'pengajuan_surat.status as statusSurat',
                            )
                            ->orderByDesc('pengajuan_surat.created_at')
                            ->get();

        return view('operator/manajemen-surat.agenda',[
            'agenda' => $agenda,
        ]);
    }

    public function print_PDF($id){
        $whatLetter = DB::table('pengajuan_surat')
                        ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                        ->select(
                            'pengajuan_surat.*',
                            'jenis_surat.jenis as surat'
                        )
                        ->where('pengajuan_surat.noSurat',$id)
                        ->first();

        $whosBelong = DB::table('penduduk')
                            ->join('banjar','penduduk.idBanjar','=','banjar.id')
                            ->select(
                                'penduduk.*',
                                'banjar.nama as namaBanjar'
                            )
                            ->where('NIK',$whatLetter->NIK)
                            ->first();

        $findKelian = DB::table('kelian_banjar_dinas')
                                ->join('penduduk','kelian_banjar_dinas.NIK','=','penduduk.NIK')
                                ->select(
                                    'kelian_banjar_dinas.*',
                                    'penduduk.nama as namaKelian'
                                )
                                ->where('kelian_banjar_dinas.idBanjar',$whosBelong->idBanjar)
                                ->first();

        if($whatLetter->surat == "Surat Keterangan Usaha"){

            $findUsaha = DB::table('usaha')
                        ->where('NIKPemilik',$whosBelong->NIK)
                        ->first();

            $pdf = PDF::loadview('layouts/surat/keterangan-usaha.index',[
                'pemohon' => $whosBelong,
                'usaha' => $findUsaha,
                'kelian' => $findKelian,
                'noSurat' => $id,
                'surat' =>$whatLetter,
            ]);

            return $pdf->stream('Surat-Keterangan-Usaha');

        }elseif($whatLetter->surat == "Surat Keterangan Kawin"){

            $findWife = DB::table('penduduk')
                        ->where('noKK',$whosBelong->noKK)
                        ->where('kedudukanKeluarga','I')
                        ->first();

            $pdf = PDF::loadview('layouts/surat/keterangan-kawin.index',[
                'pemohon' => $whosBelong,
                'kelian' => $findKelian,
                'noSurat' => $id,
                'surat' =>$whatLetter,
                'istri' => $findWife,
            ]);

            return $pdf->stream('Surat-Keterangan-Kawin');

        }elseif($whatLetter->surat == "Surat Keterangan Tempat Tinggal"){

            $pdf = PDF::loadview('layouts/surat/keterangan-tempat-tinggal.index',[
                'pemohon' => $whosBelong,
                'kelian' => $findKelian,
                'noSurat' => $id,
                'surat' =>$whatLetter,
            ]);

            return $pdf->stream('Surat-Keterangan-Tempat-Tinggal');
        }
    }

    public static function indonesianFormattedDate($date) {
        $dt = new  \Carbon\Carbon($date);
        setlocale(LC_TIME, 'IND');

        return $dt->formatLocalized('%e %B %Y'); // 3 September 2018
    }
}
