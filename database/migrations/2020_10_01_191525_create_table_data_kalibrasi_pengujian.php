<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataKalibrasiPengujian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kalibrasi_pengujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_alat')->nullable()->default(12);
            $table->string('nama_alat', 100)->nullable()->default('text');
            $table->timestamp('tanggal_kalibrasi');
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
        Schema::dropIfExists('data_kalibrasi_pengujian');
    }
}
