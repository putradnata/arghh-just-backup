<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelianBanjarDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelian_banjar_dinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idBanjar');
            $table->string('NIK', 16);
            $table->char('noTelp', 13);
            $table->date('mulaiMenjabat');
            $table->date('selesaiMenjabat');
            $table->timestamps();

            $table->foreign('NIK')->references('NIK')->on('penduduk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idBanjar')->references('id')->on('banjar')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelian_banjar_dinas');
    }
}
