@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-red-100">
        <div class="w-full max-w-lg bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6">{{ $title }}</h2>

            <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Judul</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $content->title) }}"
                        class="border border-gray-300 px-3 py-2 w-full rounded-md" required>
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi</label>
                    <textarea id="content" name="content" rows="4" class="border border-gray-300 px-3 py-2 w-full rounded-md"
                        required>{{ old('content', $content->content) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="type" class="block text-gray-700 text-sm font-semibold mb-2">Tipe Konten</label>
                    <select id="type" name="type" class="border border-gray-300 px-3 py-2 w-full rounded-md"
                        required>
                        <option value="Art" {{ old('type', $content->type) == 'Art' ? 'selected' : '' }}>Art</option>
                        <option value="Animation" {{ old('type', $content->type) == 'Animation' ? 'selected' : '' }}>
                            Animation</option>
                        <option value="Gift" {{ old('type', $content->type) == 'Gift' ? 'selected' : '' }}>Gift</option>
                        <option value="Commision" {{ old('type', $content->type) == 'Commision' ? 'selected' : '' }}>
                            Commision</option>
                        <option value="YCH" {{ old('type', $content->type) == 'YCH' ? 'selected' : '' }}>YCH</option>
                        <option value="3D" {{ old('type', $content->type) == '3D' ? 'selected' : '' }}>3D</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-gray-700 text-sm font-semibold mb-2">Gambar</label>
                    @if ($content->image)
                        <div class="relative">
                            <img id="current-image" src="{{ asset('storage/' . $content->image) }}" alt="Current Image"
                                class="mt-2 w-32 cursor-pointer">
                            <input type="file" id="image" name="image" class="hidden" accept="image/*">
                        </div>
                    @else
                        <input type="file" id="image" name="image"
                            class="border border-gray-300 px-3 py-2 w-full rounded-md" accept="image/*">
                    @endif
                </div>

                <button type="submit"
                    class="bg-theme text-white font-semibold px-4 py-2 rounded-md hover:bg-hoverTheme focus:outline-none focus:bg-red-700">Update
                    Konten</button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('profile') }}"
                    class="text-theme hover:text-hoverTheme font-semibold text-sm">Kembali</a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('current-image')?.addEventListener('click', function() {
            document.getElementById('image').click();
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('current-image').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
