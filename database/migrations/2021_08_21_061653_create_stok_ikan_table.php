<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokIkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_ikan', function (Blueprint $table) {
            $table->bigIncrements('id_stok');
            $table->bigInteger('id_user');
            $table->string('kode_ikan', '10');
            $table->bigInteger('stok');
            $table->bigInteger('stok_awal');
            $table->date('tanggal');
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
        Schema::dropIfExists('stok_ikan');
    }
}
