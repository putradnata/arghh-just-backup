<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BanjarTableSeeder extends Seeder
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
                'nama' => 'Tegal Kuwalon',
                'alamat' => 'Jalan Kenyeri No. 53A',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ],
            [
                'nama' => 'Sima',
                'alamat' => 'Jalan Kenyeri No. 52B',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ],
            [
                'nama' => 'Kerta Bumi',
                'alamat' => 'Jalan Kenyeri No. 25B',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ],
            [
                'nama' => 'Peken',
                'alamat' => 'Jalan Kenyeri No. 3',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ],
            [
                'nama' => 'Pande',
                'alamat' => 'Jalan Kecubung No. 24',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ],
            [
                'nama' => 'Lebah',
                'alamat' => 'Jalan Kecubung',
                'keterangan' => '-',
                'created_at' => Carbon::now(),
            ]
        ];

        DB::table('banjar')->insert($data);
    }
}
