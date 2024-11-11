<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryaTableSeeder extends Seeder
{
    // 30-SyahlaNurAzizah

    public function run()
    {
        DB::table('karya')->insert([
            'user_id' => null,
            'nama' => 'Karya 1',
            'artikel' => 'Deskripsi karya 1',
            'gambar' => 'path/to/image1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
