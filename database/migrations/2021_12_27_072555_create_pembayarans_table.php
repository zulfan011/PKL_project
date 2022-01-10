<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id')->on('konsumens');
            $table->bigInteger('id_cucian_keluar')->unsigned();
            $table->foreign('id_cucian_keluar')->references('id')->on('cucian_keluars');
            $table->string('nama');
            $table->string('no_telepon');
            $table->string('jenis_laundry');
            $table->string('qty');
            $table->string('harga');
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
        Schema::dropIfExists('pembayarans');
    }
}
