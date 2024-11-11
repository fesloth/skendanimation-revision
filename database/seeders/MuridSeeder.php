<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $muridData = [
            // ['nama' => 'ACHMAD HAFI FADILLAH', 'nis' => '10710', 'status' => 'Murid', 'email' => 'achmad.fadillah@example.com', 'password' => bcrypt('password')],
            ['nama' => 'AMELIA DAMAYANTI', 'nis' => 10710, 'status' => 'Murid', 'email' => 'ameliadmynti@example.com', 'password' => bcrypt('password')],
            ['nama' => 'Andromeda Adiantoro', 'nis' => 10712, 'status' => 'Murid', 'email' => 'andromeda@example.com', 'password' => bcrypt('password')],
            ['nama' => 'BAHRUL ILMI', 'nis' => 10713, 'status' => 'Murid', 'email' => 'bahrul@example.com', 'password' => bcrypt('password')],
            ['nama' => 'DEWI ANISAH PUTRI', 'nis' => 10714, 'status' => 'Murid', 'email' => 'dewiputri@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Fatimah Azzahro', 'nis' => 10715, 'status' => 'Murid', 'email' => 'fatimahazhro@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Gusti Nur Isna', 'nis' => 10716, 'status' => 'Murid', 'email' => 'gutinur@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'HUMAIRO NADHIRA HALWA', 'nis' => 10717, 'status' => 'Murid', 'email' => 'halwa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'JUWITA FASYA KUMALA DEWI', 'nis' => 10718, 'status' => 'Murid', 'email' => 'kumala@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'M. Riduan', 'nis' => 10719, 'status' => 'Murid', 'email' => 'riduan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'M. Rizki Ramadani', 'nis' => 10720, 'status' => 'Murid', 'email' => 'rizki@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMAD ARDIAN DEFANA PUTRA', 'nis' => 10721, 'status' => 'Murid', 'email' => 'ardian@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD ALI AQSO', 'nis' => 10722, 'status' => 'Murid', 'email' => 'ali@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Aufa', 'nis' => 10723, 'status' => 'Murid', 'email' => 'aufa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD DIO ADITYA RANGGA', 'nis' => 10724, 'status' => 'Murid', 'email' => 'aditya@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Farrel', 'nis' => 10725, 'status' => 'Murid', 'email' => 'farel@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD HAFI', 'nis' => 10726, 'status' => 'Murid', 'email' => 'hafi@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Irhami', 'nis' => 10727, 'status' => 'Murid', 'email' => 'irhami@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Nabil', 'nis' => 10728, 'status' => 'Murid', 'email' => 'nabil@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Sani', 'nis' => 10729, 'status' => 'Murid', 'email' => 'sani@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD SURIANSYAH', 'nis' => 10730, 'status' => 'Murid', 'email' => 'suriansyah@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Naila Huda', 'nis' => 10731, 'status' => 'Murid', 'email' => 'naila@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Nazwa Umami', 'nis' => 10732, 'status' => 'Murid', 'email' => 'nazwa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'PUTRI CAHAYA INDAH SARI', 'nis' => 10733, 'status' => 'Murid', 'email' => 'putricahaya@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Qori Nur Ajisyah', 'nis' => 10735, 'status' => 'Murid', 'email' => 'qori@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Raissa Agustina', 'nis' => 10736, 'status' => 'Murid', 'email' => 'raissa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Saskia Meilani', 'nis' => 10737, 'status' => 'Murid', 'email' => 'saski@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'SATRIA PERDANA PUTRA SUWANTO', 'nis' => 10738, 'status' => 'Murid', 'email' => 'satria@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Shinta Damayanti', 'nis' => 10739, 'status' => 'Murid', 'email' => 'shinta@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Surya Adi Purwanto', 'nis' => 10740, 'status' => 'Murid', 'email' => 'surya@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Wahyudin', 'nis' => 10742, 'status' => 'Murid', 'email' => 'wahyudin@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'YENI ASSYIFA', 'nis' => 10743, 'status' => 'Murid', 'email' => 'yeni@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Zainal Ilmi', 'nis' => 10744, 'status' => 'Murid', 'email' => 'zainal@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Zaura Azmy', 'nis' => 10745, 'status' => 'Murid', 'email' => 'zaura@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'ALTHAF DANISH ZANURA', 'nis' => 10746, 'status' => 'Murid', 'email' => 'althaf@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Darren William Sonata Wijaya', 'nis' => 10747, 'status' => 'Murid', 'email' => 'darren@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'ELIYA AMALIA', 'nis' => 10748, 'status' => 'Murid', 'email' => 'eliya@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Fadira Nabil', 'nis' => 10749, 'status' => 'Murid', 'email' => 'fadira@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'FATIMATUZZAHRA AL HUSNA', 'nis' => 10750, 'status' => 'Murid', 'email' => 'fatima@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Gita Oktavianisa', 'nis' => 10751, 'status' => 'Murid', 'email' => 'gita@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'HIDAYATUL AZKIA', 'nis' => 10752, 'status' => 'Murid', 'email' => 'azkia@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'IKHWAN RIZKI', 'nis' => 10753, 'status' => 'Murid', 'email' => 'ikhwan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'JIHAN HAFIZHAH', 'nis' => 10754, 'status' => 'Murid', 'email' => 'jihan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'JIHAN NABILA NOVITASARI', 'nis' => 10755, 'status' => 'Murid', 'email' => 'jihan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'M.Raihan Iza Akbar', 'nis' => 10756, 'status' => 'Murid', 'email' => 'raihan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Marsha Aisya Muchlis', 'nis' => 10757, 'status' => 'Murid', 'email' => 'marsha@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD DIMAS RIZKI', 'nis' => 10758, 'status' => 'Murid', 'email' => 'dimas@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Fahri', 'nis' => 10759, 'status' => 'Murid', 'email' => 'fahri@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Fahri Ramadan', 'nis' => 10760, 'status' => 'Murid', 'email' => 'fahriramadhan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD FARIZ SATRIANI', 'nis' => 10761, 'status' => 'Murid', 'email' => 'fariz@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Halim', 'nis' => 10762, 'status' => 'Murid', 'email' => 'halim@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Muhammad Miftah Anshari', 'nis' => 10763, 'status' => 'Murid', 'email' => 'miftah@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'MUHAMMAD RAIHAN HUBBY', 'nis' => 10764, 'status' => 'Murid', 'email' => 'raihanhubby@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'NAZWA SYAFITRI', 'nis' => 10765, 'status' => 'Murid', 'email' => 'nazwa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Nirina Ahmad', 'nis' => 10766, 'status' => 'Murid', 'email' => 'nirina@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Nur Huda Ibnu Faza', 'nis' => 10767, 'status' => 'Murid', 'email' => 'hudaibnu@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'NUR ZAHWA NAYLAROSYAH', 'nis' => 10768, 'status' => 'Murid', 'email' => 'zahwa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Prima Hendyka', 'nis' => 10769, 'status' => 'Murid', 'email' => 'primaa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'RAIHAN NAJWAN', 'nis' => 10770, 'status' => 'Murid', 'email' => 'najwan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Revlina Nuriqah Pribadi', 'nis' => 10771, 'status' => 'Murid', 'email' => 'revliina@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'ROMI SAPUTRA', 'nis' => 10772, 'status' => 'Murid', 'email' => 'romi@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'ROYYAN FIRDAUS', 'nis' => 10773, 'status' => 'Murid', 'email' => 'royyan@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Salsabiela', 'nis' => 10774, 'status' => 'Murid', 'email' => 'Salsabiela@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'SALSABILA NURUL HIKMAH', 'nis' => 10775, 'status' => 'Murid', 'email' => 'nurul@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Salsabila Tazkiyatun Nafs', 'nis' => 10776, 'status' => 'Murid', 'email' => 'nafs@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Sarah Nur Azizah', 'nis' => 10777, 'status' => 'Murid', 'email' => 'sarah@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Shafa Salsabila', 'nis' => 10778, 'status' => 'Murid', 'email' => 'shafa@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Velina', 'nis' => 10779, 'status' => 'Murid', 'email' => 'velina@example.com', 'password' => bcrypt('password')],
            // ['nama' => 'Zaskia Syifa', 'nis' => 10780, 'status' => 'Murid', 'email' => 'zaskia@example.com', 'password' => bcrypt('password')],
        ];

        // Memasukkan data murid ke dalam tabel users
        foreach ($muridData as $murid) {
            User::create($murid);
        }
    }
}
