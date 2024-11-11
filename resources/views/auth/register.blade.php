@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <form class="bg-[#E7C4C4] shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm max-sm:bg-white" method="POST"
            action="{{ url('/register') }}" enctype="multipart/form-data">
            @csrf

            <h2 class="text-center text-lg font-bold mb-4">Register</h2>

            <div class="mb-4 flex items-center">
                <i class="fas fa-user text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                    id="nama" name="nama" type="text" placeholder="Nama" required>
            </div>

            <div class="mb-4 flex items-center">
                <i class="fas fa-envelope text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                    id="email" name="email" type="email" placeholder="Email" required>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <i class="fas fa-key text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input data-popover-target="popover-password" data-popover-placement="bottom"
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-[#B76A6A] focus:ring-[#B76A6A]"
                    id="password" name="password" type="password" placeholder="Password" required>
                <div data-popover id="popover-password" role="tooltip"
                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Password Harus memiliki minimal 6 karakter
                        </h3>
                        <p>Lebih baik memiliki:</p>
                        <ul>
                            <li class="flex items-center mb-1">
                                <svg class="w-3.5 h-3.5 me-2 text-green-400 dark:text-green-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                                Huruf besar & kecil
                            </li>
                            <li class="flex items-center mb-1">
                                <svg class="w-3 h-3 me-2.5 text-red-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="text-theme mr-1">Tidak boleh</span> menggunakan simbol
                            </li>
                            <li class="flex items-center">
                                <svg class="w-3 h-3 me-2.5 text-red-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                Kata sandi yang lebih panjang (maksimal 12 karakter)
                            </li>
                        </ul>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <i class="fas fa-lock text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-[#B76A6A] focus:ring-[#B76A6A]"
                    id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Konfirmasi Password" required>
            </div>
            <div class="flex items-center justify-center">
                <button
                    class="bg-theme hover:bg-hoverTheme text-white font-bold py-2 px-32 rounded focus:outline-none focus:shadow-outline focus:border-[#B76A6A] focus:ring-[#B76A6A]"
                    type="submit">
                    Register
                </button>
            </div>

            <p class="mt-4 text-end text-gray-700">
                Sudah punya akun? <a href="{{ url('/login') }}" class="text-blue-500 hover:underline">Masuk</a>
            </p>
        </form>
    </div>
@endsection
@if (Session::has('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ Session::get('success') }}</span>
        </div>
    </div>
@endif
