@extends('layouts.app')

@section('content')
    @include('partials.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="flex flex-col items-center justify-center mt-24 max-sm:mt-20">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi</h2>

            <!-- Block Informasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full mb-10">
                <div class="p-4 bg-blue-100 border-l-4 border-blue-500 rounded-lg shadow-md flex items-center">
                    <i class="fas fa-users fa-2x text-blue-500 mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-gray-700">Total Pengguna</h3>
                        <p class="text-lg text-gray-900">{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="p-4 bg-green-100 border-l-4 border-green-500 rounded-lg shadow-md flex items-center">
                    <i class="fas fa-pencil-alt fa-2x text-green-500 mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-gray-700">Total Postingan</h3>
                        <p class="text-lg text-gray-900">{{ $totalPosts }}</p>
                    </div>
                </div>
                <div class="p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded-lg shadow-md flex items-center">
                    <i class="fas fa-heart fa-2x text-yellow-500 mr-3"></i>
                    <div>
                        <h3 class="font-semibold text-gray-700">Total Favorit</h3>
                        <p class="text-lg text-gray-900">{{ $totalFavorites }}</p>
                    </div>
                </div>
            </div>
            

            <!-- Tabel Pengguna dengan Favorit Terbanyak -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Postingan dengan Favorit Terbanyak</h2>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Pengguna</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jumlah Favorit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($mostFavoritedUsers as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->total_favorites }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Postingan Paling Banyak -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-10">Postingan dengan Jumlah Favorit Terbanyak</h2>
            @if ($mostFavoritedPosts->isEmpty())
                <p>Tidak ada postingan favorit yang ditemukan.</p>
            @else
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Judul Postingan</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jumlah Favorit</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Pengupload</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($mostFavoritedPosts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->favorites_count }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->user->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{ route('content.show', $post->id) }}" class="text-blue-500 hover:underline">Lihat Konten</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
