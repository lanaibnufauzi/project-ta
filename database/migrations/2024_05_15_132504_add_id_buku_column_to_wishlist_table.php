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
        Schema::table('wishlist', function (Blueprint $table) {
            $table->unsignedBigInteger('id_buku')->after('id');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropForeign(['id_buku']);
            $table->dropColumn('id_buku');
        });
    }
};
