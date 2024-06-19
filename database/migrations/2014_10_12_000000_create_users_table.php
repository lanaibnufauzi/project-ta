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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->longText('nisn')->nullable()->unique();
=======
            $table->longText('nisn')->unique()->nullable();
>>>>>>> 6c6270f7b42eabfd777e870a9308a289535c463a
            $table->longText('name');
            $table->longText('email');
            $table->longText('no_handphone');
            $table->longText('alamat');
            $table->longText('password');
            $table->string('code')->nullable();
            $table->string('status_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
