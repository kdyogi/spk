<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCalonSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_calon_siswa', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('nama_calonSiswa', 100);
            $table->string('alamat_calonSiswa', 100);
            $table->char('telp_calonSiswa', 16);
            $table->string('jenisKelamin_calonSiswa', 100);
            $table->string('email_calonSiswa', 100);
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('tb_calon_siswa');
    }
}
