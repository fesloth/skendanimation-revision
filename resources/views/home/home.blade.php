@extends('layouts.app')

@section('content')
    <div class="relative bg-cover bg-center text-white py-48 mt-18 flex flex-col items-center justify-center shadow-2xl"
        style="background-image: url('{{ asset('img/materiii.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-transparent to-black opacity-80"></div>
        <div
            class="relative bg-black bg-opacity-60 p-6 sm:p-12 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1">
            <h1
                class="text-4xl sm:text-6xl lg:text-7xl font-extrabold mb-4 tracking-wide drop-shadow-lg text-center animate-pulse">
                Selamat Datang di <span class="text-theme">SkendAnimation</span>
            </h1>
            <p class="text-base sm:text-lg lg:text-2xl mb-6 leading-relaxed tracking-wide text-center text-gray-200">
                Tempat terbaik untuk menampilkan karya-karya siswa<span class="text-theme"> Animasi SMKN 2 Banjarmasin</span>
            </p>
        </div>
    </div>
    <section class="bg-white dark:bg-gray-900 py-8">
        <div class="px-4 mx-auto max-w-screen-xl lg:py-16">
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-10 md:p-12 mb-10 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <a href="#"
                    class="bg-red-100 text-utama text-xs font-medium inline-flex items-center px-3 py-1.5 rounded-md dark:bg-gray-700 dark:hoverTheme mb-2">
                    <svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Profile
                </a>
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-4">Apa itu jurusan Animasi?
                </h1>
                <iframe width="100%" height="415" src="https://www.youtube.com/embed/3vG9Yer7cPk?feature=oembed"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen class="rounded-lg shadow-md"></iframe>
                <p class="text-lg font-normal text-gray-600 dark:text-gray-400 mb-6 mt-3">Program keahlian Animasi merupakan
                    salah satu program keahlian yang sudah ada di SMKN 2 Banjarmasin. Animasi adalah sebuah program keahlian
                    yang mempelajari dasar – dasar kemampuan dan keilmuan menjadi seorang animator. Di Program Keahlian
                    Animasi siswa akan mempelajari strategi menggambar.</p>
                <a href="https://smkn2-bjm.sch.id/?page_id=524" target="_blank"
                    class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-red-500 to-font hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 transition-all duration-300">
                    Baca Selengkapnya
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div
                class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8 grid lg:grid-cols-2 gap-8 lg:gap-16 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-10 md:p-12 shadow-lg hover:shadow-xl transition-shadow duration-300 mb-10">
                <div class="tutor">
                    <a href="https://www.youtube.com/watch?v=QjEWCKnzn4Q"
                        class="bg-blue-200 text-blue-600 text-xs font-medium inline-flex items-center px-3 py-1.5 rounded-md dark:bg-gray-700 dark:hoverTheme mb-2">
                        <svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M19.003 3A2 2 0 0 1 21 5v2h-2V5.414L17.414 7h-2.828l2-2h-2.172l-2 2H9.586l2-2H9.414l-2 2H3V5a2 2 0 0 1 2-2h14.003ZM3 9v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Zm2-2.414L6.586 5H5v1.586Zm4.553 4.52a1 1 0 0 1 1.047.094l4 3a1 1 0 0 1 0 1.6l-4 3A1 1 0 0 1 9 18v-6a1 1 0 0 1 .553-.894Z"
                                clip-rule="evenodd" />
                        </svg>

                        Tutorial
                    </a>
                    <img src="{{ asset('img/tutor.png') }}" alt="Tutorial" class="w-auto h-auto">
                </div>
                <div class="flex flex-col justify-center">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Bingung cara menggunakan website kami?</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Kami menyiapkan video
                        tutotial bagi pengguna yang masih kebingungan menjelajahi atau menggunakan website ini.</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                        <a href="https://www.youtube.com/watch?v=QjEWCKnzn4Q" target="_blank"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-red-500 to-font hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 transition-all duration-300">
                            Buka Tutorial
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div
                    class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-10 md:p-12 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <a href="/blog"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-3 py-1.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Karya
                    </a>

                    <img src="{{ asset('img/karya.png') }}" alt="Home" class="w-full h-auto">

                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-3">Lihat Galeri Karya</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Temukan berbagai karya yang
                        menampilkan kreativitas para siswa-siswi jurusan animasi, menghidupkan seni dalam bentuk gambar yang
                        memukau.</p>
                    <a href="/blog"
                        class="text-theme dark:text-red-500 hover:underline font-medium text-lg inline-flex items-center">Pergi
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>

                <div
                    class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-10 md:p-12 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <a href="/favorites"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-3 py-1.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                        <i class="fa-solid fa-heart w-3 h-3 me-1.5"></i>
                        Favorite
                    </a>
                    <img src="{{ asset('img/home2.png') }}" alt="Home" class="w-auto h-auto">
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-3">Simpan Karya Favoritmu</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Simpan karya siswa animasi
                        favoritmu, sehingga kamu bisa dengan mudah menikmati kembali karya-karya yang paling kamu sukai.</p>
                    <a href="/favorites"
                        class="text-theme dark:text-red-500 hover:underline font-medium text-lg inline-flex items-center">Pergi
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
