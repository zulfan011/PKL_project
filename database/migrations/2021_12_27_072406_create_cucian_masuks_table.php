<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCucianMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cucian_masuks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_konsumen')->unsigned();
            $table->foreign('kd_konsumen')->references('id')->on('konsumens');
            $table->date('tanggal_cucian_masuk');
            $table->string('jenis_laundry');
            $table->string('qty');
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
        Schema::dropIfExists('cucian_masuks');
    }
}
