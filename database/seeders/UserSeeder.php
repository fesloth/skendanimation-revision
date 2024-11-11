<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * 30-SyahlaNurAzizah
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => null,
            'nama' => 'Udin Sedunia',
            'status' => 'laki-laki',
            'nis' => 123456,
            'profile_image' => 'path/to/image.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
