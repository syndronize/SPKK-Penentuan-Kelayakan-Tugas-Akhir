<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ta', function (Blueprint $table) {
            $table->id('id_ta');
            $table->integer('id_user');
            $table->string('judul_ta');
            $table->text('tema_ta');
            $table->text('deskripsi_ta');
            $table->text('latar_belakang_ta');
            $table->text('tujuan_penelitian_ta');
            $table->text('rumusan_masalah_ta');
            $table->text('metodologi_ta');
            $table->text('matakuliah_ta');
            $table->text('penelitian_ta');
            $table->double('ipk_ta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ta');
    }
}
