<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prasyarat

Sebelum Anda mulai, pastikan Anda telah memenuhi prasyarat berikut:

- PHP >= 8.2.0
- [Composer](https://getcomposer.org) - [Cara instalasi Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
- [Node.js & NPM](https://nodejs.org) - [Cara instalasi Node.js & NPM](https://nodejs.org/en/download/)
- [Laravel](https://laravel.com) - [Cara instalasi Laravel](https://laravel.com/docs/8.x/installation)

## Instalasi

Berikut adalah langkah-langkah untuk mengkloning dan menjalankan proyek ini di lingkungan lokal Anda:

1. Buka terminal/git bash Anda.
2. Clone repositori ini ke direktori lokal Anda:
 ```bash
    https://github.com/fesloth/SkendAnimation.git](https://github.com/fesloth/skendanimation-revision.git
```
3. Pindah ke direktori proyek:
```bash
   cd nama-proyek-laravel
```
4. Salin file .env.example menjadi .env:
```bash
    cp .env.example .env
```
5. Buat kunci aplikasi Laravel dengan perintah:
```bash
   php artisan key:generate
```
6. Jalankan migrasi untuk membuat tabel-tabel database:
```bash
    php artisan migrate
```
7. Jalankan server Laravel:
```bash
   php artisan serve
```
8. Buka browser dan akses proyek Anda melalui http://localhost:8000.
9. Jalankan Tailwind:
```bash
    npm run dev
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Deskripsi

Selamat datang di website kami yaitu SkendAnimation yang membantu siswa/siswi jurusan animasi SMK Negeri 2 Banjarmasin mempromosikan hasil produk mereka. Website ini juga berperan dalam mempromosikan karya-karya siswanya, misalnya seni digital, ilustrasi, dan animasi.

# Fitur Utama
- Login:
Siapapun pengguna software harus login terlebih dahulu
untuk masuk ke dalam website.
Jika tidak ada akun silahkan buat terlebih dahulu.
- Login Siswa:
Halaman ini dikhususkan untuk siswa-siswi jurusan animasi karena
hanya mereka yang diberikan akses dapat menambahkan konten
(karya mereka) ke website kami.
- Register:
Pengguna harus membuat akun di halaman ini agar dapat mengakses website sesuai status pengguna.
- Halaman Admin:
Di halaman ini, hanya admin yang dapat mengakses, fungsinya ada hapus user, edit user,
tambah user, dan laporkan user. Ada juga fitur analitik user dan favorite.
- Dashboard:
Di halaman ini, ditampilkan banner dan foto-foto jurusan animasi di SMKN 2 Banjarmasin, serta video youtube yang mereka buat.
- Galeri:
Di halaman ini, siswa/siswi dapat menampilkan produk-karya yang mereka hasilkan, seperti gantungan kunci, poster, dan sebagainya.
Kami gabung karya mereka dalam satu halaman.
- Favorit:
Di halaman ini, kami akan memberikan akses kepada pengunjung yang menyukai karya-karya siswa jurusan animasi, dan apabila
pengunjung menyukai salah satu karya dan ingin dibuatkan gambar maka dapat menghubungi nomor siswa di halaman profile
- Profile:
Di halaman ini, selain info mengenai media sosial siswa/siswi jurusan animasi,
terdapat fitur unggah produk/gambar/animasi ciptaan mereka. Ini memungkinkan mereka
membangun personal branding dengan mengikuti arahan yang telah disediakan
- Desain Responsif:
Website kami dirancang dengan menggunakan Tailwind CSS untuk memberikan pengalaman pengguna yang baik di berbagai perangkat.

### Frontend & Backend
<table>
  <tr>
    <td align="center">
      <a href="https://tailwindcss.com/docs">
        <img src="https://avatars.githubusercontent.com/u/30317862?s=200&v=4" alt="Tailwind CSS Logo" width="200">
      </a>
    </td>
    <td align="center">
      <a href="https://laravel.com/docs">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel Logo" width="200">
      </a>
    </td>
  </tr>
</table>
