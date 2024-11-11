<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelsTableSeeder extends Seeder
{
    /**
     * 30-SyahlaNurAzizah
     */
    public function run(): void
    {
        DB::table('artikels')->insert([
            'id' => 1,
            'user_id' => null,
            'gambar' => 'path/to/image1.jpg',
            'artikel' => 'Jadi guys besok ada tugas blablabla',
            'category' => 'art',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
