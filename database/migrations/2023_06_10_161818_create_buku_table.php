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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->longText('isbn');
            $table->longText('judul_buku');
            $table->longText('deskripsi');
            $table->longText('tema');
            $table->longText('penerbit');
            $table->longText('tgl_terbit');
            $table->longText('cover_buku');
            $table->longText('jumlah_halaman');
            $table->longText('stok');
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
        Schema::dropIfExists('buku');
    }
};
