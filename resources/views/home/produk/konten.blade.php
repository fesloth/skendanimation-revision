@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-red-100">
        <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold text-center mb-4">Tambah Konten Baru</h2>

            <form action="{{ route('store-content') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="image"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 relative">
                        <!-- Preview image -->
                        <img id="image-preview" class="absolute inset-0 w-full h-full object-cover rounded-lg hidden"/>

                        <!-- Default upload icon and text -->
                        <div id="default-text" class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Unggah
                                    gambarmu!</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <!-- Hidden input file -->
                        <input id="image" name="image" type="file" class="hidden" multiple required />
                    </label>
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Judul</label>
                    <textarea name="title" id="title" class="border border-gray-300 px-3 py-2 w-full rounded-md" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi</label>
                    <textarea name="content" id="content" class="border border-gray-300 px-3 py-2 w-full rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-semibold mb-2">Tipe Konten</label>
                    <select name="type" id="type" class="border border-gray-300 px-3 py-2 w-full rounded-md" required>
                        <option value="" disabled selected>Pilih tipe konten</option>
                        <option value="Art">Art</option>
                        <option value="Animation">Animation</option>
                        <option value="Gift">Gift</option>
                        <option value="Commision">Commision</option>
                        <option value="YCH">YCH</option>
                        <option value="3D">3D</option>
                    </select>
                </div>

                <button type="submit"
                    class="bg-theme text-white font-semibold px-4 py-2 rounded-md hover:bg-hoverTheme focus:outline-none focus:bg-hoverTheme">
                    Tambah Konten
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="/profile" class="text-theme hover:text-hoverTheme font-semibold text-sm">Kembali</a>
            </div>
        </div>
    </div>

    <script>
        // JavaScript untuk menampilkan preview gambar
        document.getElementById('image').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            const defaultText = document.getElementById('default-text');
            const file = event.target.files[0];
            const reader = new FileReader();

            // Tampilkan preview gambar ketika file dipilih
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden'); // Tampilkan elemen gambar
                defaultText.classList.add('hidden'); // Sembunyikan teks default
            };

            // Membaca file yang dipilih
            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
