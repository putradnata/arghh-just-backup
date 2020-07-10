<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanSuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'noSurat' => '001-SM-I-2020',
                'NIK' => '5171020511980001',
                'idJenisSurat' => '1',
                'idBanjar' => '2',
                'status' => '-1',
                'idUser' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'noSurat' => '002-SM-I-2020',
                'NIK' => '5171020511980001',
                'idJenisSurat' => '3',
                'idBanjar' => '2',
                'status' => '-1',
                'idUser' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'noSurat' => '003-SM-II-2020',
                'NIK' => '5171020104700002',
                'idJenisSurat' => '3',
                'idBanjar' => '2',
                'status' => '-1',
                'idUser' => '2',
                'created_at' => Carbon::now(),
            ]
        ];
        DB::table('pengajuan_surat')->insert($data);
    }
}
