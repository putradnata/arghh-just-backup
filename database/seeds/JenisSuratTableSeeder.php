<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JenisSuratTableSeeder extends Seeder
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
                'jenis' => 'Surat Keterangan Belum Kawin',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Keterangan Kurang Mampu',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Kelakuan Baik',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Keterangan Kematian',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Keterangan Usaha',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Keterangan Pindah',
                'created_at' => Carbon::now(),
            ],
            [
                'jenis' => 'Surat Keterangan Tempat Tinggal',
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('jenis_surat')->insert($data);
    }
}
