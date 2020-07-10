<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->string('noSurat', 30)->primary();
            $table->char('NIK', 16);
            $table->unsignedBigInteger('idJenisSurat');
            $table->unsignedBigInteger('idKelianDinas');
            $table->enum('status', ['D', 'KBD', 'KD', 'S']);
            $table->unsignedBigInteger('idUser')->nullable();
            $table->string('pathKK');
            $table->timestamps();

            $table->foreign('NIK')->references('NIK')->on('penduduk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idJenisSurat')->references('id')->on('jenis_surat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idKelianDinas')->references('id')->on('kelian_banjar_dinas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_surat');
    }
}
