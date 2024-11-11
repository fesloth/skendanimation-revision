<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-black font-open-sans">
    <div class="container mx-auto px-4 py-16">
        <div class="flex flex-col items-center space-y-4">
            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data"
                class="text-sm w-full max-w-md">
                @csrf
                @method('PUT')

                <label for="profile_picture" class="relative cursor-pointer flex justify-center items-center">
                    <img src="{{ asset($user->profile_image ? 'storage/' . $user->profile_image : 'img/user.jpeg') }}"
                        alt="Profile Picture" class="w-32 h-32 rounded-full object-cover mb-4">

                    <span class="absolute bg-font p-2 px-[11px] rounded-full"
                        style="right: 160px; bottom: 9px; margin: 0;">
                        <i class="fas fa-pencil-alt text-white"></i>
                    </span>

                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden"
                        onchange="updateImage(this)">
                </label>
                
                
                <div class="mb-4">
                    <label for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Your Name">
                    @error('nama')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Edit Bio -->
                <div class="mb-4">
                    <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit
                        Bio:</label>
                    <textarea id="bio" name="bio" rows="4"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Type your bio...">{{ auth()->user()->bio }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="instagram"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram:</label>
                    <input type="url" id="instagram" name="instagram"
                        value="{{ old('instagram', $user->instagram) }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="masukkan link instagram">
                    @error('instagram')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="youtube"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube:</label>
                    <input type="url" id="youtube" name="youtube" value="{{ old('youtube', $user->youtube) }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="masukkan link instagram">
                    @error('youtube')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="discord"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discord:</label>
                    <input type="text" id="discord" name="discord" value="{{ old('discord', $user->discord) }}"
                        class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Discord ID">
                    @error('discord')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-theme text-white py-2 px-4 rounded hover:bg-hoverTheme">
                    Simpan
                </button>

                <a href="/profile" class="text-font hover:text-theme block mt-3">
                    <i class="fas fa-arrow-left"></i> Kembali
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
</body>

</html>
