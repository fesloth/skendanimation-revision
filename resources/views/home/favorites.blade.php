@extends('layouts.app')

@section('content')
    <div class="container mt-28 mb-72 mx-auto max-w-screen-xl max-sm:px-4">
        @if (session('success'))
            <div id="alert-remove-favorite" class="mb-4 p-4 text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="sr-only">Success</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="closeAlert()" class="text-green-600 hover:text-green-800 ml-4">
                        &times; 
                    </button>
                </div>
            </div>
        @endif

        @if ($favorites->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mx-0 sm:mx-4 lg:mx-20 gap-4 sm:gap-6">
                @foreach ($favorites as $favorite)
                    <div class="relative max-w-sm bg-white rounded-lg shadow-lg">
                        <a href="{{ route('content.show',$favorite->content->id) }}">
                        <img src="{{ asset('storage/' . $favorite->content->image) }}" alt="Content Image" class="w-full h-56 sm:h-72 object-cover rounded-t-lg">
                        </a>
                        <div class="p-4">
                            <h2 class="text-xl sm:text-2xl font-bold">{{ $favorite->content->title }}</h2>
                            <p class="text-gray-700">{{ $favorite->content->content }}</p>
                            <p class="text-gray-600 italic text-sm">Author: {{ $favorite->content->user->nama }}</p>
                            <!-- Form to remove favorite -->
                            <form id="favorite-form-{{ $favorite->content->id }}" action="{{ route('favorites.destroy', $favorite->content->id) }}" method="POST" class="absolute bottom-4 right-4">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-theme hover:text-utama" onclick="openDeleteModal('{{ $favorite->content->id }}')">
                                    <i class="fas fa-trash fa-lg"></i> <!-- Font Awesome trash icon -->
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $favorites->links() }} 
            </div>
        @else
            <p class="text-center text-gray-600">You have no favorite contents yet.</p>
        @endif
    </div>

    <!-- Modal Konfirmasi Hapus Favorite -->
    <div id="confirm-delete-modal" class="hidden fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg bg-white">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-5 h-5 mr-2 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.012 10.012 0 0 0 10 0Zm0 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8ZM9 7h2v2H9Zm0 4h2v2H9Z"/>
                    </svg>
                    <span class="font-bold">Konfirmasi Hapus</span>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    Apakah Anda yakin ingin menghapus konten ini dari favorit?
                </div>
                <div class="flex">
                    <button type="button" id="confirm-delete" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2">
                        Hapus
                    </button>
                    <button type="button" onclick="closeDeleteModal()" class="text-red-500 bg-transparent border border-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let contentIdToDelete = null;

        function openDeleteModal(contentId) {
            contentIdToDelete = contentId;
            document.getElementById('confirm-delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('confirm-delete-modal').classList.add('hidden');
            contentIdToDelete = null; // Reset the contentId
        }

        document.getElementById('confirm-delete').onclick = function() {
            if (contentIdToDelete) {
                const form = document.getElementById(`favorite-form-${contentIdToDelete}`);
                form.submit(); // Submit the form to delete the favorite
            }
        }

        function closeAlert() {
            document.getElementById('alert-remove-favorite').style.display = 'none'; // Menyembunyikan notifikasi
        }
    </script>
@endsection
