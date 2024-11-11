<nav class="bg-utama border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full z-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <a href="./" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/navbar_logoss.png') }}" alt="Default Avatar" width="50" />
            <span
                class="text-2xl max-sm:text-xl font-bold whitespace-nowrap text-white dark:text-white">SkendAnimation</span>
        </a>

        <!-- Burger Menu Button -->
        <button type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user" aria-expanded="false" id="navbar-toggle">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div class="hidden w-full md:flex md:w-auto" id="navbar-menu">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-utama md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 {{ request()->is('/') ? 'text-theme2' : 'text-white' }} rounded hover:bg-red-900 md:hover:bg-transparent md:hover:text-hoverTheme dark:text-white">Beranda</a>
                </li>
                <li>
                    <a href="/blog"
                        class="block py-2 px-3 {{ request()->is('blog') ? 'text-theme2' : 'text-white' }} rounded hover:bg-red-900 md:hover:bg-transparent md:hover:text-hoverTheme dark:text-white">Galeri</a>
                </li>
                <li>
                    <a href="/favorites"
                        class="block py-2 px-3 {{ request()->is('favorites') ? 'text-theme2' : 'text-white' }} rounded hover:bg-red-900 md:hover:bg-transparent md:hover:text-hoverTheme dark:text-white">Favorit</a>
                </li>
                <li>
                    @if (!auth()->check())
                        <a href="{{ route('login') }}"
                            class="text-white md:hidden block py-2 px-3 rounded hover:bg-red-900 md:hover:bg-transparent md:hover:text-hoverTheme dark:text-white lg:hidden">
                            Login
                        </a>
                    @endif
                </li>
            </ul>
        </div>

        <!-- User Profile Menu (if authenticated) -->
        @if (auth()->check())
            <div class="relative" id="user-profile">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img src="{{ asset(auth()->user()->profile_image ? 'storage/' . auth()->user()->profile_image : 'img/user.jpeg') }}"
                        alt="Profile Picture" class="w-10 h-10 rounded-full object-cover object-center">
                </button>
                <div class="z-50 hidden w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        @auth
                            <span class="block text-md text-gray-900 dark:text-white">{{ Auth::user()->nama }}</span>
                            <span class="block truncate text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                            <span
                                class="block text-sm {{ Auth::user()->status == 'Guru' ? 'text-blue-500' : (Auth::user()->status == 'Murid' ? 'text-yellow-300' : 'text-green-500') }} dark:text-gray-400">{{ Auth::user()->status }}</span>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}"
                                class="bg-utama text-white font-bold py-2 px-4 ml-6 rounded hover:bg-red-900">Login</a>
                        @endguest
                    </div>
                    <ul class="py-2">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-address-card"></i> Pengaturan
                                Profile</a>
                        </li>
                        @if (auth()->check() && auth()->user()->status === 'Admin')
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-user-shield"></i> Beranda
                                    Admin</a>
                            </li>
                        @endif
                        <li>
                            <a href="#" onclick="openLogoutDialog()"
                                class="block px-4 py-2 text-sm text-utama hover:bg-gray-100 dark:text-red-200 dark:hover:text-white"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="bg-utama text-white font-bold py-2 px-4 rounded hover:bg-red-900 max-sm:hidden">Login</a>
        @endif
    </div>

    <!-- Logout Dialog -->
    <div id="logout-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div id="alert-additional-content-logout"
                class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                role="alert">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
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
                        class="text-white bg-utama hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Keluar
                    </button>
                    <button type="button" onclick="closeLogoutDialog()"
                        class="text-utama bg-transparent border border-utama hover:bg-utama hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    // alert logout
    function confirmLogout() {
        document.getElementById('logout-form').submit();
    }

    function closeLogoutDialog() {
        document.getElementById("logout-dialog").style.display = "none";
    }

    function openLogoutDialog() {
        document.getElementById("logout-dialog").style.display = "block";
    }

    // toggle navbar
    document.getElementById('navbar-toggle').addEventListener('click', function() {
        var menu = document.getElementById('navbar-menu');
        var userProfile = document.getElementById('user-profile');
        if (menu) {
            menu.classList.toggle('hidden');
            if (userProfile) {
                userProfile.classList.toggle('hidden');
            }
        }
    });

    // kalau toggle ditekan maka profile user bakal hilang
    document.addEventListener('click', function(event) {
        var menu = document.getElementById('navbar-menu');
        var userProfile = document.getElementById('user-profile');
        var toggleButton = document.getElementById('navbar-toggle');
        if (userProfile && menu && !menu.contains(event.target) && !userProfile.contains(event.target) && !
            toggleButton.contains(event.target)) {
            userProfile.classList.remove('hidden');
        }
    });
</script>
