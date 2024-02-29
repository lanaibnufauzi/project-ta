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
        Schema::create('detail__buku', function (Blueprint $table) {
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku');
            $table->tinyInteger('halaman');
            $table->longText('isi_buku');
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
        Schema::dropIfExists('detail__buku');
    }
};
