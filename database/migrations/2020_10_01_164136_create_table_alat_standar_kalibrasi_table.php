<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlatStandarKalibrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_standar_kalibrasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_alat')->nullable();
            $table->string('nama_alat_ukur');
            // $table->timestamp('tanggal_kalibrasi')->useCurrent();
            $table->string('gambar');
            $table->string('merk');
            $table->string('nomor_seri');
            $table->string('kapasitas');
            $table->string('kelas');
            $table->bigInteger('nomor_inventaris');
            $table->bigInteger('jumlah');
            $table->string('internal');
            $table->string('eksternal');
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
        Schema::dropIfExists('alat_standar_kalibrasi');
    }
}