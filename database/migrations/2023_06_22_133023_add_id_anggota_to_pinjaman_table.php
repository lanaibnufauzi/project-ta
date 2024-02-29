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
        Schema::table('pinjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_anggota')->after('id')->default(2);
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjaman', function (Blueprint $table) {
            $table->dropForeign(['id_anggota']);
            $table->dropColumn('id_anggota');
        });
    }
};
