<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatStandarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_standar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_alat');
            $table->string('nama_alat_ukur');
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
        Schema::dropIfExists('alat_standar');
    }
}
