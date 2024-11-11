<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * 30-SyahlaNurAzizah
     */
    public function run(): void
    {
        DB::table('announcements')->insert([
            'user_id' => null,
            'announs' => 'lorem ipsum dolor sit amet',
            'importance' => 'sangat penting',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
