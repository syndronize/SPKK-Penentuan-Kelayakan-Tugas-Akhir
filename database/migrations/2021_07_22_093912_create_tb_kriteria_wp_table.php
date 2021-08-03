<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKriteriaWpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kriteria_wp', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->integer('id_user')->nullable();
            $table->integer('id_ta');
            $table->double('originalitas_kriteria')->nullable();
            $table->double('sasaran_kriteria')->nullable();
            $table->double('metodologi_kriteria')->nullable();
            $table->double('kemiripan_kriteria')->nullable();
            $table->double('ipk_kriteria')->nullable();
            $table->double('nilai_final_kriteria_wp',8,2)->nullable();
            $table->double('nilai_final_kriteria_saw',8,2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kriteria_wp');
    }
}
