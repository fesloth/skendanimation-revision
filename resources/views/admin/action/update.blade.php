@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold text-center mb-4">Edit User</h2>
            <form id="update-form" action="{{ route('admin.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                    <div class="flex items-center">
                        <i class="fas fa-user text-theme mr-2"></i>
                        <input
                            class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                            id="nama" name="nama" type="text" placeholder="Nama" value="{{ $user->nama }}"
                            required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-theme mr-2"></i>
                        <input
                            class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                            id="email" name="email" type="email" placeholder="Email" value="{{ $user->email }}"
                            required>
                    </div>
                    @error('email')
                        <p class="text-font text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-semibold mb-2">Status</label>
                    <div class="flex items-center">
                        <i class="fas fa-pen text-theme mr-2"></i>
                        <select
                            class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                            id="status" name="status" required>
                            <option value="" disabled>Pilih Status</option>
                            <option value="Admin" {{ $user->status === 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Guru" {{ $user->status === 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Murid" {{ $user->status === 'Murid' ? 'selected' : '' }}>Murid</option>
                            <option value="Lainnya" {{ $user->status === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="flex">
                    <a id="open-update-dialog"
                        class="bg-theme cursor-pointer hover:bg-hoverTheme text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                        type="button">
                        Update
                    </a>
                </div>
                <div class="mt-3 text-end">
                    <a href="/admin" class="text-theme hover:text-hoverTheme">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
                <div id="update-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen">
                        <div id="alert-additional-content-update"
                            class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                            </div>
                            <div class="mt-2 mb-4 text-sm">
                                Apakah Anda yakin ingin mengubah informasi dari pengguna ini?
                            </div>
                            <div class="flex">
                                <button id="update-button"
                                    class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-theme dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Yakin
                                </button>
                                <button type="button" onclick="closeUpdateDialog()"
                                    class="text-blue-800 bg-transparent border border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-theme dark:border-theme dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var updateButton = document.getElementById("update-button");
            if (updateButton) {
                updateButton.addEventListener('click', function() {
                    // Form submission logic
                    document.getElementById("update-form").submit();
                });
            }

            var openButton = document.getElementById("open-update-dialog");
            if (openButton) {
                openButton.addEventListener('click', function() {
                    openUpdateDialog();
                });
            }

            function closeUpdateDialog() {
                var updateDialog = document.getElementById("update-dialog");
                if (updateDialog) {
                    updateDialog.classList.add("hidden");
                }
            }

            function openUpdateDialog() {
                var updateDialog = document.getElementById("update-dialog");
                if (updateDialog) {
                    updateDialog.classList.remove("hidden");
                }
            }
        });
    </script>
@endsection
