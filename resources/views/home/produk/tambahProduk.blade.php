@extends('layouts.app')

@section('content')
    <div class="w-full max-w-md mx-auto h-screen mt-12 px-8 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Tambah Produk</h2>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-white">Judul Produk</label>
                <input type="text" id="title" name="title"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-theme focus:border-theme dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-600 dark:focus:border-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-white">Deskripsi
                    Produk</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-theme focus:border-theme dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-600 dark:focus:border-blue-600" required></textarea>
            </div>
            <div class="mb-4">
                <div class="flex items-center justify-center w-full">
                    <label for="gambar_produk"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="gambar_produk" name="gambar_produk" type="file" class="hidden" multiple required/>
                    </label>
                </div>
            </div>
            <div class="flex justify-between">
                <a href="/produk" class="text-font hover:text-theme mt-3 block">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-theme hover:bg-hoverTheme focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-font">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
