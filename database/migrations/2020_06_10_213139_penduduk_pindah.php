<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendudukPindah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_pindah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIK', 16);
            $table->string('noKK',16);
            $table->string('alasanPindah',20)->nullable();
            $table->string('alamatPindah',100)->nullable();
            $table->date('padaTanggal')->nullable();
            $table->date('tanggalLapor')->nullable();
            $table->string('deskripsi',80)->nullable();
            $table->timestamps();

            $table->foreign('NIK')->references('NIK')->on('penduduk')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk_pindah');
    }
}
