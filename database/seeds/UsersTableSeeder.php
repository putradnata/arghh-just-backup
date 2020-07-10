<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
                'NIK' => '5171020104700002',
                'username' => 'suwada',
                'email' => 'suwada01@gmail.com',
                'password' => Hash::make('asdasd123'),
                'jabatan' => 'o',
                'created_at' => Carbon::now(),
            ],
            [
                'NIK' => '5171020511980001',
                'username' => 'andika',
                'email' => 'putradnata15@gmail.com',
                'password' => Hash::make('asdasd123'),
                'jabatan' => 'p',
                'created_at' => Carbon::now(),
            ]
        ];
        DB::table('users')->insert($data);
    }
}
