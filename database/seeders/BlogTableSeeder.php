<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTableSeeder extends Seeder
{
    /**
     * 30-SyahlaNurAzizah
     */
    public function run(): void
    {
        DB::table('blog')->insert([
            'user_id' => null,
            'title' => 'Besok senin',
            'content' => 'besok senin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
