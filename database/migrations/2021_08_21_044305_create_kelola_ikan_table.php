<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolaIkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelola_ikan', function (Blueprint $table) {
            $table->bigIncrements('id_kelola_ikan');
            $table->bigInteger('id_user');
            $table->string('kode_ikan', '10');
            $table->string('nama_ikan', '100');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_jual');
            $table->date('tanggal_input');
            $table->date('tanggal_expired');
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
        Schema::dropIfExists('kelola_ikan');
    }
}
