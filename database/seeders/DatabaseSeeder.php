<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Anggota;
use App\Models\kategori;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'user',
        ]);

        kategori::create([
            'nama_kategori' => 'Fiksi',
        ]);

        kategori::create([
            'nama_kategori' => 'Non Fiksi',
        ]);

        kategori::create([
            'nama_kategori' => 'Sains Fiksi',
        ]);

        kategori::create([
            'nama_kategori' => 'Sejarah',
        ]);
        kategori::create([
            'nama_kategori' => 'Puisi',
        ]);
        kategori::create([
            'nama_kategori' => 'Pendidikan',
        ]);
        kategori::create([
            'nama_kategori' => 'Misteri dan Detektif',
        ]);
        kategori::create([
            'nama_kategori' => 'Bisnis dan Keuagan',
        ]);
        kategori::create([
            'nama_kategori' => 'Fantasi',
        ]);

        User::create([
            'name' => 'lana',
            'email' => 'lana@admin.com',
            'password' => bcrypt('lana'),
            'no_handpone' => '085233918803',
            'alamat' => 'Jember',
            'id_role' => 1,
            'email_verified_at' => now()
        ]);

        // Anggota::create([
        //   'users_id' => '1'
        // ]);


        User::create([
            'name' => 'ibnu',
            'email' => 'ibnu@admin.com',
            'password' => bcrypt('ibnu'),
            'no_handpone' => '085233918803',
            'alamat' => 'Jember',
            'id_role' => 2,
            'email_verified_at' => now()
        ]);

        Anggota::create([
            'users_id' => '2'
          ]);


    }
}

