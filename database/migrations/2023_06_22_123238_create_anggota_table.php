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
            Schema::create('anggota', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->enum('status', ['Pria', 'Wanita',]);
                $table->string('telpon');
                $table->string('alamat');
                $table->string('tempat_lahir');
                $table->date('tanggal_lahir');
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
            Schema::dropIfExists('anggota');
        }
    };
