<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelianBanjarDinasTableSeeder extends Seeder
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
                'idBanjar' => '1',
                'NIK' => '5171021810720005',
                'noTelp' => '081234567890',
                'mulaiMenjabat' => '2016/01/01',
                'SelesaiMenjabat' => '2021/01/01',
                'created_at' => Carbon::now(),
            ],
            [
                'idBanjar' => '2',
                'NIK' => '5171020104700002',
                'noTelp' => '081234567890',
                'mulaiMenjabat' => '2016/01/01',
                'SelesaiMenjabat' => '2021/01/01',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('kelian_banjar_dinas')->insert($data);
    }
}
