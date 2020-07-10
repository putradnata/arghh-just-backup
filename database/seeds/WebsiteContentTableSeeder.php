<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebsiteContentTableSeeder extends Seeder
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
                'visi' => 'BERSAMA MEMBANGUN DESA SUMERTA KAJA YANG JAYANTI BERLANDASKAN TRI HITA KARANA',
                'misi' => '<p><em>Meningkatkan srada bakti dan kerukunan&nbsp;kehidupan desa&nbsp;dengan tetap menjaga&nbsp;keajegan&nbsp;seni,&nbsp;adat&nbsp;dan&nbsp;budaya&nbsp;Bali yang bernafaskan agama Hindu.</em></p>

                <p><em>Memantapkan&nbsp;tata kelola pemerintahan&nbsp;dan&nbsp;kualitas pelayanan publik&nbsp;yang baik&nbsp;melalui penerapan teknologi informasi dan komunikasi.</em></p>

                <p><em>Memperkuat daya saing&nbsp;desa&nbsp;melalui peningkatan mutu sumber daya manusia dan&nbsp;penataan lingkungan serta&nbsp;infrastruktur wilayah</em></p>

                <p><em>Meningkatkan pemberdayaan masyarakat dan pengembangan&nbsp;Usaha Mikro Kecil dan Menengah (UMKM)&nbsp;serta BUMDes&nbsp;sebagai pilar ekonomi kerakyatan</em></p>

                <p><em>Mendorong terciptanya ketentraman dan ketertiban dalam kehidupan bernegara, berbangsa dan bermasyarakat&nbsp;dengan membangun sinergitas Desa Adat dan Desa Dinas.</em></p>',
                'lokasiDesa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.4294043479304!2d115.22722371541214!3d-8.650646290387472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f7c3f430f0d%3A0xdbc3e8da214e257e!2sKantor%20Desa%20Sumerta%20Kaja%20Denpasar!5e0!3m',
                'logoDesa' => '1581180336_Logo-Desa-Sumerta-Kaja.png',
                'sliderPhoto' => '1588766434_Slider-Photo-Desa-Sumerta-Kaja.png',
                'sliderTextH1' => 'Selamat Datang',
                'sliderTextH2' => 'di Website Desa Sumerta Kaja',
                'idUser' =>'1',
                'created_at' => Carbon::now(),
            ]
        ];
        DB::table('website_contents')->insert($data);
    }
}
