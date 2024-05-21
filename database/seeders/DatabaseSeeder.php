<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Anggota;
use App\Models\buku;
use App\Models\kategori;
use App\Models\KategoriDenda;
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
            'no_handphone' => '085233918803',
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
            'no_handphone' => '085233918803',
            'alamat' => 'Jember',
            'id_role' => 2,
            'email_verified_at' => now()
        ]);

        Anggota::create([
            'users_id' => '2'
        ]);


        buku::create([
            'isbn' => '978-3-16-148410-0',
            'judul_buku' => 'The Fault in Our Stars',
            'deskripsi' => 'The Fault in Our Stars adalah novel remaja yang ditulis oleh John Green. Novel ini menceritakan kisah cinta dua remaja, Hazel Grace Lancaster dan Augustus Waters, yang sama-sama mengidap kanker.',
            'tema' => 'Romance',
            'penerbit' => 'Penguin Group',
            'tgl_terbit' => '2012-01-10',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '313',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-1',
            'judul_buku' => 'The Hunger Games',
            'deskripsi' => 'The Hunger Games adalah novel fiksi ilmiah yang ditulis oleh Suzanne Collins. Novel ini menceritakan kisah Katniss Everdeen, seorang gadis muda yang terpilih untuk berpartisipasi dalam Hunger Games, sebuah pertandingan mematikan yang diadakan setiap tahun oleh Capitol.',
            'tema' => 'Adventure',
            'penerbit' => 'Scholastic Corporation',
            'tgl_terbit' => '2008-09-14',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '374',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-2',
            'judul_buku' => 'Harry Potter and the Philosopher\'s Stone',
            'deskripsi' => 'Harry Potter and the Philosopher\'s Stone adalah novel fantasi yang ditulis oleh J.K. Rowling. Novel ini menceritakan kisah Harry Potter, seorang anak yatim piatu yang mengetahui bahwa ia adalah seorang penyihir dan diundang untuk belajar di Sekolah Sihir Hogwarts.',
            'tema' => 'Fantasy',
            'penerbit' => 'Bloomsbury Publishing',
            'tgl_terbit' => '1997-06-26',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '223',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-3',
            'judul_buku' => 'The Da Vinci Code',
            'deskripsi' => 'The Da Vinci Code adalah novel misteri-detective yang ditulis oleh Dan Brown. Novel ini menceritakan kisah Robert Langdon, seorang profesor simbologi yang terlibat dalam penyelidikan pembunuhan seorang kurator di Louvre Museum, Paris.',
            'tema' => 'Mystery',
            'penerbit' => 'Doubleday',
            'tgl_terbit' => '2003-03-18',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '454',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-4',
            'judul_buku' => 'The Alchemist',
            'deskripsi' => 'The Alchemist adalah novel fiksi filosofis yang ditulis oleh Paulo Coelho. Novel ini menceritakan kisah Santiago, seorang gembala Andalusia yang berusaha mencari harta karun di Piramida Mesir setelah bermimpi bertemu dengan seorang raja.',
            'tema' => 'Adventure',
            'penerbit' => 'HarperCollins',
            'tgl_terbit' => '1988-01-01',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '177',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-5',
            'judul_buku' => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
            'deskripsi' => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe adalah novel fantasi yang ditulis oleh C.S. Lewis. Novel ini menceritakan kisah empat anak yang menemukan dunia ajaib Narnia melalui lemari pakaian di rumah profesor mereka.',
            'tema' => 'Fantasy',
            'penerbit' => 'Geoffrey Bles',
            'tgl_terbit' => '1950-10-16',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '206',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-6',
            'judul_buku' => 'The Lord of the Rings: The Fellowship of the Ring',
            'deskripsi' => 'The Lord of the Rings: The Fellowship of the Ring adalah novel fantasi epik yang ditulis oleh J.R.R. Tolkien. Novel ini menceritakan kisah Frodo Baggins, seorang hobbit yang ditugaskan untuk menghancurkan Cincin Kekuasaan di Gunung Doom.',
            'tema' => 'Fantasy',
            'penerbit' => 'Allen & Unwin',
            'tgl_terbit' => '1954-07-29',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '398',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-7',
            'judul_buku' => 'To Kill a Mockingbird',
            'deskripsi' => 'To Kill a Mockingbird adalah novel fiksi yang ditulis oleh Harper Lee. Novel ini menceritakan kisah Scout Finch, seorang gadis muda yang tumbuh dewasa di kota kecil Alabama dan menyaksikan ayahnya, Atticus Finch, berjuang melawan rasisme dan ketidakadilan.',
            'tema' => 'Drama',
            'penerbit' => 'J.B. Lippincott & Co.',
            'tgl_terbit' => '1960-07-11',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '281',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-8',
            'judul_buku' => 'The Great Gatsby',
            'deskripsi' => 'The Great Gatsby adalah novel fiksi yang ditulis oleh F. Scott Fitzgerald. Novel ini menceritakan kisah Jay Gatsby, seorang miliuner misterius yang tinggal di Long Island dan mencintai Daisy Buchanan, seorang wanita cantik yang sudah menikah.',
            'tema' => 'Romance',
            'penerbit' => 'Charles Scribner\'s Sons',
            'tgl_terbit' => '1925-04-10',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '180',
            'stok' => '10',
            'kategori_id' => '1'
        ]);

        buku::create([
            'isbn' => '978-3-16-148410-9',
            'judul_buku' => '1984',
            'deskripsi' => '1984 adalah novel distopia yang ditulis oleh George Orwell. Novel ini menceritakan kisah Winston Smith, seorang pegawai pemerintah yang mencoba melawan rezim totaliter Partai Partai dan pemimpinnya, Big Brother.',
            'tema' => 'Science Fiction',
            'penerbit' => 'Secker & Warburg',
            'tgl_terbit' => '1949-06-08',
            'cover_buku' => 'https://images-na.ssl-images-amazon.com/images/I/51UvKuZ8JNL._SX331_BO1,204,203,200_.jpg',
            'jumlah_halaman' => '328',
            'stok' => '10',
            'kategori_id' => '1'
        ]);



        KategoriDenda::create([
            'nama_kategori' => 'Telat',
            'harga_kategori' => '1000',
        ]);

        KategoriDenda::create([
            'nama_kategori' => 'Rusak',
            'harga_kategori' => '5000',
        ]);


        KategoriDenda::create([
            'nama_kategori' => 'Hilang',
            'harga_kategori' => '10000',
        ]);

        User::create([
            'name' => 'lana',
            'email' => 'lana@gmail.com',
            'password' => bcrypt('1'),
            'no_handphone' => '085233918803',
            'alamat' => 'Jember',
            'id_role' => 2,
            'email_verified_at' => now()
        ]);

        Anggota::create([
            'users_id' => '3'
        ]);
    }
}
