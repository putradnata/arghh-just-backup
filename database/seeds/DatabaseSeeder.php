<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BanjarTableSeeder::class);
        $this->call(JenisSuratTableSeeder::class);
        $this->call(PendudukTableSeeder::class);
        $this->call(KelianBanjarDinasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PengajuanSuratTableSeeder::class);
        $this->call(WebsiteContentTableSeeder::class);
    }
}
