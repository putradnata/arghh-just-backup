<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usaha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIKPemilik', 16);
            $table->string('nama',40)->nullable();
            $table->string('jenisUsaha',20)->nullable();
            $table->string('alamat',80)->nullable();
            $table->timestamps();

            $table->foreign('NIKPemilik')->references('NIK')->on('penduduk')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usaha');
    }
}
