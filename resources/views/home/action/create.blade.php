@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col items-center space-y-2">
            <form action="{{ route('store-profile') }}" method="POST" enctype="multipart/form-data"
                class="text-sm w-full max-w-md">
                @csrf
                @method('POST')
                <label for="profile_picture" class="relative flex justify-center  cursor-pointer">
                    <img src="{{ asset('img/user.jpeg') }}" alt="Profile Picture"
                        class="w-32 h-32 rounded-full object-cover mb-4">
                    <span class="absolute bg-white p-2 px-[11px] rounded-full"
                        style="right: 160px; bottom: 9px; margin: 0;">
                        <i class="fas fa-pencil-alt text-slate-800"></i>
                    </span>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden"
                        onchange="updateImage(this)">
                </label>
                <div class="mb-4">
                    <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah
                        Bio:</label>
                    <textarea id="bio" name="bio" rows="4"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Type your bio...">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Create Profile
                </button>

                <a href="/profile" class="text-blue-500 hover:text-blue-700 block mt-3">
                    <i class="fas fa-arrow-left"></i> Back to Profile
                </a>
            </form>
        </div>
    </div>
    <script src="../node_modules/preline/dist/preline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        function updateImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.rounded-full').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
