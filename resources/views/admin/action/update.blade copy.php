@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Edit User</h2>

        <form action="{{ route('admin.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                <div class="flex items-center">
                    <i class="fas fa-user text-blue-600 mr-2"></i>
                    <input class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama" value="{{ $user->nama }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <div class="flex items-center">
                    <i class="fas fa-envelope text-blue-600 mr-2"></i>
                    <input class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" value="{{ $user->email }}" required>
                </div>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-semibold mb-2">Status</label>
                <div class="flex items-center">
                    <i class="fas fa-pen text-blue-600 mr-2"></i>
                    <select class="appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required>
                        <option value="" disabled>Pilih Status</option>
                        <option value="Admin" {{ $user->status === 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Guru" {{ $user->status === 'Guru' ? 'selected' : '' }}>Guru</option>
                        <option value="Murid" {{ $user->status === 'Murid' ? 'selected' : '' }}>Murid</option>
                        <option value="Lainnya" {{ $user->status === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="flex">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update
                </button>
            </div>
            <div class="mt-3 text-end">
                <a href="/admin" class="text-blue-500">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection