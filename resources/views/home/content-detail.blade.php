@extends('layouts.app')

@section('content')
    <div class="container mt-36 mb-24 px-4">
        @if ($content)
            <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Image Section -->
                <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" class="w-full h-auto object-cover md:w-1/3 rounded-lg shadow-md">

                <div class="p-6 flex flex-col justify-between w-full">
                    <!-- Title and Description Section -->
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $content->title }}</h1>
                        <p class="text-gray-700 mb-3">{{ $content->content }}</p>
                        <!-- Display Total Likes -->
                        <p class="text-gray-600 mt-2">Total Disukai: <span class="font-bold">{{ $content->favorites_count }}</span></p>
                    </div>

                    <!-- Divider -->
                    <hr class="border-t border-gray-300 my-6">

                    <!-- User Profile Section -->
                    <div class="text-center">
                        <div class="p-3">
                            <div class="mb-2">
                                <a href="#">
                                    <img class="w-16 h-16 rounded-full mx-auto object-cover shadow-md"
                                         src="{{ asset('storage/' . $content->user->profile_image) }}"
                                         alt="{{ $content->user->nama }}">
                                </a>
                            </div>
                            <p class="text-base font-semibold text-gray-900 dark:text-white mb-2">
                                <a href="#">Diposting oleh: {{ $content->user->nama }}</a>
                            </p>
                            <div class="flex justify-center space-x-4 mb-4">
                                <form action="{{ route('user.profile', $content->user->id) }}" method="GET">
                                    <button type="submit" class="bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2">
                                        Kunjungi Profil
                                    </button>
                                </form>
                                
                                <!-- Check if the content is already favorited -->
                                @php
                                    $isFavorited = $content->favorites->contains('user_id', auth()->id());
                                @endphp
                    
                                <form action="{{ $isFavorited ? route('favorites.destroy', $content->id) : route('favorites.store', $content->id) }}" method="POST">
                                    @csrf
                                    @if($isFavorited)
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2">
                                            Hapus dari Favorit
                                        </button>
                                    @else
                                        <button type="submit" class="bg-theme text-white hover:bg-[#BA7979] focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2">
                                            Tambah ke Favorit
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>                    

                    <!-- Upload Date -->
                    <p class="text-gray-500 text-sm mb-4 text-center">
                        Uploaded on: {{ $content->created_at->setTimezone('Asia/Jakarta')->format('j F Y, H:i') }} WIB
                    </p>
                    
                    <div class="flex justify-center">
                        <a href="{{ route('blog') }}"
                            class="bg-theme text-white hover:bg-[#BA7979] focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-gray-600">Content not found.</p>
        @endif
    </div>
@endsection
