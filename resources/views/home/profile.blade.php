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

<body class="bg-white text-black font-poppins">
    <section class="max-sm:">
        @if ($user->profile_image || $user->bio || $user->instagram || $user->discord || $user->youtube)
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between mx-auto max-w-screen-xl p-2 mt-4">
                <a href="/"><i class="fa-solid fa-house"></i></a>
                @if (auth()->user()->status === 'Murid')
                    <div class="relative">
                        <button onclick="toggleGearDropdown()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <i class="fa-solid fa-gear"></i>
                        </button>
                        <div id="gearDropdown" class="absolute right-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="{{ route('edit.nis') }}" class="block px-4 py-2 hover:bg-gray-100">Ubah NIS/Password</a>
                                </li>
                                <li>
                                    <a href="#" onclick="openLogoutDialog()" class="block px-4 py-2 text-sm text-[#6D0707] hover:bg-gray-100 dark:text-red-200 dark:hover:text-white"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
            <div id="logout-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen">
                    <div id="alert-additional-content-logout"
                        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Apakah Anda yakin ingin keluar?
                        </div>
                        <div class="flex">
                            <button type="button" onclick="confirmLogout()"
                                class="text-white bg-[#6D0707] hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Keluar
                            </button>
                            <button type="button" onclick="closeLogoutDialog()"
                                class="text-[#6D0707] bg-transparent border border-[#6D0707] hover:bg-[#6D0707] hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-4 py-16 max-w-screen-sm md:max-w-screen-xl">
                <div class="flex flex-col items-center md:flex-row relative group">
                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('img/user.jpeg') }}" alt="Profile Picture"
                    class="w-52 h-52 rounded-full object-cover mb-4 lg:mr-8 md:mr-10 lg:mb-0 group-hover:opacity-50 transition-opacity duration-300">
                

                    <!-- Ikon Sampah -->
                    @if (auth()->id() === $user->id && $user->profile_image)
                        <div
                            class="absolute inset-0 flex opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="p-2 max-sm:ml-[164px] max-sm:mb-[180px] ml-[88px] rounded-full text-theme hover:text-red-700 focus:outline-none"
                                onclick="confirmDelete()">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </div>
                    @endif
                    <div class="text-center md:text-left">
                        <h3 class="text-3xl font-bold mb-2 text-font">{{ $user->nama }}</h3>
                        <p class="text-md mb-3 text-font">{{ $user->bio }}</p>
                        <div class="flex gap-3 mb-3">
                            @if (isset($instagramLink) && !empty($instagramLink))
                                <p class="text-md mb-3">
                                    <span class="fab fa-instagram text-pink-700"></span>
                                    <a href="{{ $instagramLink }}" target="_blank"
                                        class="text-font hover:underline">Instagram</a>
                                </p>
                            @endif
                            @if (isset($youtubeLink) && !empty($youtubeLink))
                                <p class="text-md mb-3">
                                    <span class="fab fa-youtube text-red-600"></span>
                                    <a href="{{ $youtubeLink }}" target="_blank"
                                        class="text-font hover:underline">YouTube</a>
                                </p>
                            @endif
                            @if (isset($discordID) && !empty($discordID))
                                <p class="text-md mb-3">
                                    <span class="fab fa-discord text-blue-900"></span>
                                    <a href="{{ $discordID }}" target="_blank"
                                        class="text-font hover:underline">Discord</a>
                                </p>
                            @endif
                        </div>

                        @if (auth()->id() === $user->id)
                            <div class="relative">
                                <!-- Fitur Edit Profile -->
                                <button class="bg-[#E7C4C4] text-font py-2 px-4 rounded-lg hover:bg-hoverTheme">
                                    <a href="{{ route('edit-profile') }}" class="text-white">Edit
                                        <i class="fas fa-pencil ml-1"></i>
                                    </a>
                                </button>

                                <!-- Fitur Tambah Konten hanya untuk Admin -->
                                @if (!in_array(auth()->user()->status, ['Lainnya', 'Guru', 'Admin']))
                                    <button class="bg-[#dc9d9d] text-font py-2 px-4 rounded-lg hover:bg-hoverTheme">
                                        <a href="{{ route('add-content') }}" class="text-white">Tambah Konten
                                            <i class="fas fa-plus ml-1"></i>
                                        </a>
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Modal Konfirmasi Hapus -->
            <div id="deleteModal" class="hidden fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen">
                    <div id="alert-additional-content-delete"
                        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Peringatan</span>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Apakah Anda yakin ingin menghapus gambar profil?
                        </div>
                        <div class="flex">
                            <form action="{{ route('delete-profile-image') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center">
                                    Ya, Hapus
                                </button>
                            </form>
                            <button type="button" onclick="closeModal()"
                                class="text-[#6D0707] bg-transparent border border-[#6D0707] hover:bg-[#6D0707] hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @if ($userContents->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-24">
                    @foreach ($userContents as $content)
                        <div class="relative bg-white rounded-lg shadow-md overflow-hidden p-6">
                            @if (auth()->id() === $user->id)
                                <!-- Dropdown Menu Button -->
                                <button onclick="toggleDropdown('dropdownDots{{ $content->id }}')"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button>
                                <!-- Dropdown Menu -->
                                <div id="dropdownDots{{ $content->id }}"
                                    class="absolute top-10 right-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                        <li>
                                            <a href="{{ route('content.edit', $content->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('content.destroy', $content->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block px-4 py-2 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Hapus
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image"
                                    class="object-cover h-96 w-full max-sm:w-full max-sm:h-full">
                            </div>
                            <div class="mt-4">
                                <h2 class="text-xl font-bold mb-2">{{ $content->title }}</h2>
                                <p class="text-lg font-normal mb-2">{{ $content->content }}</p>
                                <p class="text-sm text-gray-500">Type: {{ $content->type }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                @if (!in_array(auth()->user()->status, ['Lainnya', 'Guru', 'Admin']))
                    <p class="text-center text-gray-600 max-sm:hidden">Belum ada konten yang ditambahkan oleh pengguna.
                    </p>
                @endif
            @endif
            <script>
                function toggleDropdown(id) {
                    const dropdown = document.getElementById(id);
                    dropdown.classList.toggle('hidden');
                }
            </script>
        @else
            <div class="container mx-auto px-4 py-16 lg:px-0">
                <a href="/" class="absolute top-4 left-4 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-home text-2xl"></i>
                </a>
                <div class="lg:flex lg:items-center justify-center">
                    <span
                        class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center mb-4 lg:mr-8 lg:mb-0">
                        <i class="fas fa-camera text-3xl text-white"></i>
                    </span>
                    <div>
                        <h3 class="text-3xl font-bold mb-2">{{ auth()->user()->nama }}</h3>
                        @if (auth()->user()->bio)
                            <p class="text-xl mb-3">{{ auth()->user()->bio }}</p>
                        @else
                            <p class="text-md mb-3">Anda belum ada bio
                                <a href="/profile-create" class="text-blue-500 hover:underline">Tambah Bio</a>
                            </p>
                        @endif
                        <button class="bg-blue-200 text-blue-500 py-2 px-4 rounded-lg hover:bg-blue-100">
                            <a href="{{ route('edit-profile') }}">Edit Profile</a>
                        </button>
                        @if (!in_array(auth()->user()->status, ['Lainnya', 'Guru', 'Admin']))
                            <button class="bg-[#dc9d9d] text-font py-2 px-4 rounded-lg hover:bg-hoverTheme">
                                <a href="{{ route('add-content') }}" class="text-white">Tambah Konten</a>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        </div>
    </section>


    {{-- <div class="lg:hidden md:hidden">
        <div class="container mt-16 mb-36 px-4">
            <div class="max-w-80 mx-auto bg-white rounded-lg overflow-hidden flex justify-between">
                <a href="/"><i class="fa-solid fa-house"></i></a>
                @if (auth()->user()->status === 'Murid')
                    <!-- Gear Icon -->
                    <div class="relative">
                        <button onclick="toggleGearDropdown()"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <i class="fa-solid fa-gear"></i>
                        </button>
                        <!-- Gear Dropdown Menu -->
                        <div id="gearDropdown"
                            class="absolute right-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="{{ route('edit.nis') }}" class="block px-4 py-2 hover:bg-gray-100">Ubah
                                        NIS/Password</a>
                                </li>
                                <li>
                                    <a href="#" onclick="openLogoutDialog()"
                                        class="block px-4 py-2 text-sm text-[#6D0707] hover:bg-gray-100 dark:text-red-200 dark:hover:text-white"><i
                                            class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            </nav>
            <div id="logout-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen">
                    <div id="alert-additional-content-logout"
                        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Apakah Anda yakin ingin keluar?
                        </div>
                        <div class="flex">
                            <button type="button" onclick="confirmLogout()"
                                class="text-white bg-[#6D0707] hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Keluar
                            </button>
                            <button type="button" onclick="closeLogoutDialog()"
                                class="text-[#6D0707] bg-transparent border border-[#6D0707] hover:bg-[#6D0707] hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Information -->
            <div class="p-6 text-center">
                <img class="w-32 h-32 rounded-full object-cover mx-auto"
                    src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image">
                <h1 class="text-2xl font-bold text-gray-900 mt-4">{{ $user->nama }}</h1>
                <p class="text-gray-500">{{ $user->bio }}</p>

                <!-- Social Links -->
                <div class="flex justify-center space-x-4 mt-4">
                    @if ($instagramLink)
                        <a href="{{ $instagramLink }}" target="_blank" class="fab fa-instagram text-pink-700"></a>
                    @endif
                    @if ($youtubeLink)
                        <a href="{{ $youtubeLink }}" target="_blank" class="fab fa-youtube text-red-600"></a>
                    @endif
                    @if ($discordID)
                        <a href="{{ $discordID }}" target="_blank" class="fab fa-discord text-blue-900"></a>
                    @endif
                </div>
            </div>

            <!-- Tampilkan hanya jika user yang sedang login adalah pemilik profil -->
            @if (auth()->id() === $user->id)
                <div class="p-6 text-center">
                    <a href="{{ route('edit-profile') }}"
                        class="bg-theme hover:bg-hoverTheme text-white px-4 py-2 rounded-lg">Edit Profile</a>
                    @if (!in_array(auth()->user()->status, ['Lainnya', 'Guru', 'Admin']))
                        <a href="{{ route('add-content') }}"
                            class="bg-font hover:bg-hoverTheme text-white px-4 py-2 rounded-lg">Tambah Konten</a>
                    @endif
                </div>
            @endif

            @forelse ($userContents as $content)
                <div class="relative mb-6 bg-gray-100 p-4 rounded-lg shadow-md">
                    <!-- Dropdown Menu Button -->
                    <button onclick="toggleDropdown('dropdownDots{{ $content->id }}')"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <i class="fa-solid fa-ellipsis-vertical w-6 h-6"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownDots{{ $content->id }}"
                        class="absolute top-10 right-2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                        <ul class="py-2 text-sm text-gray-700">
                            <li>
                                <a href="{{ route('content.edit', $content->id) }}"
                                    class="block px-4 py-2 hover:bg-gray-100">
                                    Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('content.destroy', $content->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gray-100">
                                        Hapus
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <!-- Content Details -->
                    <h3 class="text-lg font-semibold">{{ $content->title }}</h3>
                    <p class="text-gray-700">{{ $content->content }}</p>
                    <img src="{{ asset('storage/' . $content->image) }}" class="w-full h-48 object-cover mt-2"
                        alt="Content Image">
                </div>
            @empty
                @if (!in_array(auth()->user()->status, ['Lainnya', 'Guru', 'Admin']))
                    <p class="text-gray-600">Belum ada postingan.</p>
                @endif
            @endforelse
        </div>
    </div>
    </div>
    </div>
    </div>
    </div> --}}
      <script src="../node_modules/preline/dist/preline.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        function confirmDelete() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function toggleGearDropdown() {
            const dropdown = document.getElementById('gearDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Optional: Close dropdown when clicking outside of it
        window.onclick = function(event) {
            const dropdown = document.getElementById('gearDropdown');
            if (!event.target.matches('.fa-gear') && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        };

        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }

        function closeLogoutDialog() {
            document.getElementById("logout-dialog").style.display = "none";
        }

        function openLogoutDialog() {
            document.getElementById("logout-dialog").style.display = "block";
        }
    </script>
</body>

</html>
