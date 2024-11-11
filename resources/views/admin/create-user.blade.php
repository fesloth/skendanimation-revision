@extends('layouts.app')

@section('content')
  @include('partials.sidebar')

    <!-- isinya -->
    <div class="p-4 sm:ml-64">
        <h1 class="text-3xl mb-8">Create User</h1>

        <!-- Success message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('create-user.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Admin">Admin</option>
                    <option value="Guru">Guru</option>
                    <option value="Murid">Murid</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input NIS (only for Murid) -->
            <div id="nisField" class="mb-4">
                <label for="nis" class="block text-gray-700">NIS</label>
                <input type="text" name="nis" id="nis" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ old('nis') }}">
                @error('nis')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ old('nama') }}">
                @error('nama')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-red-500 text-white p-2 rounded">Tambah Pengguna</button>
        </form>
        <script>
            const nisField = document.getElementById('nis');
            const statusSelect = document.getElementById('status');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            function handleStatusChange() {
                const statusValue = statusSelect.value;

                if (statusValue === 'Murid') {
                    nisField.disabled = false; // Enable NIS for "Murid"
                    nisField.classList.remove('bg-gray-200', 'text-gray-500'); // Reset styles

                    emailInput.disabled = true; // Disable email input for "Murid"
                    emailInput.value = ''; // Clear email input
                    emailInput.classList.add('bg-gray-200', 'text-gray-500'); // Style for disabled

                    passwordInput.disabled = true; // Disable password input for "Murid"
                    passwordInput.value = ''; // Clear password input
                    passwordInput.classList.add('bg-gray-200', 'text-gray-500'); // Style for disabled
                } else {
                    nisField.disabled = true; // Disable NIS for other statuses
                    nisField.classList.add('bg-gray-200', 'text-gray-500'); // Style for disabled NIS

                    emailInput.disabled = false; // Enable email for other statuses
                    emailInput.classList.remove('bg-gray-200', 'text-gray-500'); // Reset styles

                    passwordInput.disabled = false; // Enable password for other statuses
                    passwordInput.classList.remove('bg-gray-200', 'text-gray-500'); // Reset styles

                    // Clear email and password fields
                    emailInput.value = '';
                    passwordInput.value = '';
                }
            }
            // Panggil fungsi saat pertama kali memuat halaman
            handleStatusChange();

            // Tambahkan event listener untuk mengubah status
            statusSelect.addEventListener('change', handleStatusChange);
        </script>
    @endsection
