@extends('layouts.app')

@section('content')
<div
class="flex flex-col sm:flex-row max-sm:flex-col items-center space-x-4 mx-4 sm:mx-24 mt-10 sm:mt-36 max-sm:mx-4 max-sm:mt-28">
<!-- Search Form -->
<form class="w-full px-4 max-sm:mb-4" method="GET" action="{{ route('filtered.content') }}">
    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative flex items-center">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <i class="fas fa-search w-4 h-4 text-gray-500 dark:text-gray-400"></i>
        </div>
        <input type="search" id="search" name="query" value="{{ request('query') }}"
            class="w-full p-3 ps-10 pe-14 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
            placeholder="Cari Pengguna..." />
        <button type="submit"
            class="absolute mx-3 my-1 end-0 inset-y-0 me-1 text-white bg-theme hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>

<!-- Dropdown Button -->
<div class="relative mt-4 mx-auto max-w-screen-xl px-4 sm:mt-0 max-sm:mt-0">
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="text-gray-700 border border-gray-300 hover:text-red-700 hover:border-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 inline-flex items-center dark:text-gray-200 dark:border-gray-600 dark:hover:text-red-500 dark:hover:border-red-500 dark:focus:ring-red-800"
        type="button">Filter
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute mt-2 right-0">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <!-- All Option -->
            <li>
                <a href="{{ route('filtered.content', ['query' => request('query')]) }}"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
            </li>
            <!-- Filter Options -->
            @foreach (['Art', 'Animation', 'Gift', 'Commision', 'YCH', '3D'] as $typeOption)
                <li>
                    <a href="{{ route('filtered.content', ['type' => $typeOption, 'query' => request('query')]) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $typeOption }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
    <!-- Content Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4 mx-4 sm:mx-24 mt-10 mb-20">
        @forelse ($userContents as $content)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-5 relative mb-4">
                <!-- Dropdown Menu Trigger -->
                <button id="dropdownMenuIconButton{{ $content->id }}"
                    data-dropdown-toggle="dropdownDots{{ $content->id }}" data-dropdown-placement="bottom-start"
                    class="absolute top-2 right-2 inline-flex items-center p-2 text-sm font-medium text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                        <path
                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdownDots{{ $content->id }}"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600 absolute top-8 right-2">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownMenuIconButton{{ $content->id }}">
                        <li>
                            <a href="{{ route('content.show', $content->id) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rincian</a>
                        </li>
                        <li>
                            <a href="{{ route('reports.create', $content->id) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Laporkan</a>
                        </li>
                        @if (auth()->check() && Auth::user()->status === 'Admin')
                            <li>
                                <form action="{{ route('contents.destroy', $content->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="block px-4 py-2 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Hapus
                                    </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Content Details -->
                <div class="aspect-w-16 aspect-h-9 mb-4">
                    <a href="{{ route('content.show', $content->id) }}">
                        <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image"
                            class="object-cover h-96 w-full max-sm:h-full max-sm:w-full">
                    </a>
                </div>
                <div class="mt-4">
                    <p class="text-lg font-semibold mb-2">{{ $content->user->nama }}</p>
                    <p class="font-normal mb-2">{{ $content->content }}</p>
                    <p class="text-gray-600 italic text-sm mb-2">Type: {{ $content->type }}</p>
                </div>

                <!-- Icon Love -->
                @php
                    // Cek apakah konten ini ada di dalam daftar favorit
                    $isFavorited = $favorites->contains($content->id);
                @endphp

                <form
                    action="{{ $isFavorited ? route('favorites.destroy', $content->id) : route('favorites.store', $content->id) }}"
                    method="POST" class="absolute bottom-4 right-4" id="favorite-form-{{ $content->id }}">
                    @csrf
                    @if ($isFavorited)
                        @method('DELETE')
                    @endif
                    <button type="submit" class="text-gray-500 hover:text-red-500">
                        <i id="love-icon-{{ $content->id }}"
                            class="{{ $isFavorited ? 'fas fa-heart text-red-500 text-2xl' : 'fas fa-heart text-2xl' }}"></i>
                    </button>
                </form>
            </div>
        @empty
            <p class="text-center text-gray-600">{{ $noResultsMessage }}</p>
        @endforelse
    </div>
    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $userContents->links() }}
    </div>
    <script>
        function toggleFavorite(contentId) {
            const loveIcon = document.getElementById(`love-icon-${contentId}`);
            const favoriteForm = document.getElementById(`favorite-form-${contentId}`);

            // Toggle the heart icon color
            if (loveIcon.classList.contains('text-red-500')) {
                // Jika sudah berwarna, hapus favorit
                loveIcon.classList.remove('text-red-500');
            } else {
                // Jika tidak berwarna, tambahkan favorit
                loveIcon.classList.add('text-red-500');
            }

            // Submit the form
            favoriteForm.submit();
        }

        document.querySelectorAll('[data-dropdown-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const dropdownId = button.getAttribute('data-dropdown-toggle');
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu.id === dropdownId) {
                        menu.classList.toggle('hidden');
                    } else {
                        menu.classList.add('hidden');
                    }
                });
            });
        });

        document.addEventListener('click', (e) => {
            if (!e.target.matches('[data-dropdown-toggle]')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>
@endsection
