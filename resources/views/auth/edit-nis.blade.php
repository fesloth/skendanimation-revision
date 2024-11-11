@extends('layouts.app')

@section('content')

<div class="bg-white text-black font-open-sans flex items-center justify-center min-h-screen">
    <div class="container mx-auto w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Password</h2>
        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        <form action="{{ route('update.nis') }}" method="POST">
            @csrf

            <!-- Previous NIS/Password Field -->
            <div class="mb-4">
                <label for="previous_nis" class="block text-md font-medium">Password Sebelumnya:</label>
                <input type="text" name="previous_nis" id="previous_nis" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
                @error('previous_nis')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- New NIS Field -->
            <div class="mb-4">
                <label for="nis" class="block text-md font-medium">Password Baru:</label>
                <input type="password" name="nis" id="nis" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
                @error('nis')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm New NIS Field -->
            <div class="mb-4">
                <label for="confirm_nis" class="block text-md font-medium">Konfirmasi Password Baru:</label>
                <input type="password" name="confirm_nis" id="confirm_nis" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
                @error('confirm_nis')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
            <button type="submit" class="bg-theme hover:bg-hoverTheme text-white py-2 px-4 rounded-lg">Perbarui Password</button>
            <a href="/profile" class="text-font mt-3">Kembali</a>
        </div>
        </form>
    </div>
</div>
@endsection
