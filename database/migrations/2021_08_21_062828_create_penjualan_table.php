<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_penjualan');
            $table->bigInteger('id_user');
            $table->bigInteger('id_stok');
            $table->bigInteger('id_histori_stok');
            $table->bigInteger('id_pembayaran');
            $table->string('kode_ikan', '10');
            $table->bigInteger('stok_jual');
            $table->date('tanggal_jual');
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
        Schema::dropIfExists('penjualan');
    }
}
