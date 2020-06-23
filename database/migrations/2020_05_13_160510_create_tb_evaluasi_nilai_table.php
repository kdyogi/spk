<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbEvaluasiNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_evaluasi_nilai', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->integer('alternatif_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('nilai')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_evaluasi_nilai');
    }
}
