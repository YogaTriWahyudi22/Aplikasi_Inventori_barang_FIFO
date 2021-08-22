<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_stok', function (Blueprint $table) {
            $table->bigIncrements('id_histori_stok');
            $table->bigInteger('id_user');
            $table->string('kode_ikan', '10');
            $table->bigInteger('stok_awal');
            $table->bigInteger('stok');
            $table->date('tanggal');
            $table->string('keterangan', '100');
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
        Schema::dropIfExists('histori_stok');
    }
}
