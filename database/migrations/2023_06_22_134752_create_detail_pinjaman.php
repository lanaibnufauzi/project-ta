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
        Schema::create('detail_pinjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('pinjaman_id');
            $table->foreign('pinjaman_id')->references('id')->on('pinjaman');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku');
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
        Schema::dropIfExists('detail_pinjaman_colom');
    }
};
