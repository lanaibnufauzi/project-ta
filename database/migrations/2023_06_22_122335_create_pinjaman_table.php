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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->dateTime('confirmation_deadline');
            $table->string('no_transaksi')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->string('bank')->nullable();
            $table->string('no_va')->nullable();
            $table->string('expired_date')->nullable();
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
        Schema::dropIfExists('pinjaman');
    }
};
