<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penduduk', function (Blueprint $table) {
            $table->string('NIK', 16)->primary();
            $table->string('noKK',16);
            $table->string('alasanPindah')->nullable();
            $table->string('alamatPindah')->nullable();
            $table->string('sebabKematian')->nullable();
            $table->date('padaTanggal')->nullable();
            $table->date('tanggalLapor')->nullable();
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('detail_penduduk');
    }
}
