<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_denda', function (Blueprint $table) {
            $table->unsignedBigInteger('denda_id');
            $table->foreign('denda_id')->references('id')->on('denda');
            $table->unsignedBigInteger('kategori_denda_id');
            $table->foreign('kategori_denda_id')->references('id')->on('kategori_denda');
            $table->integer('sub_total');
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
        Schema::dropIfExists('detail_denda');
    }
};
