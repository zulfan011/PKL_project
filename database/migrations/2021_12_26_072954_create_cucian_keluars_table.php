<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCucianKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cucian_keluars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id')->on('konsumens');
            $table->date('tanggal_cucian_keluar');
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
        Schema::dropIfExists('cucian_keluars');
    }
}
