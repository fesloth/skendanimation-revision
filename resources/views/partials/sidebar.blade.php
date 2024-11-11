<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-red-800 to-red-600 border-b border-red-700 shadow-md">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-red-200 rounded-lg sm:hidden hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 transition duration-150">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="/" class="flex md:me-24">
                    <img src="{{ asset('img/navbar_logoss.png') }}" alt="Logo" width="40" class="max-sm:w-12" />
                    <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-white">SkendAnimation</span>
                </a>
            </div>
            @if (auth()->check())
                <div class="relative" id="user-profile">
                    <button type="button" class="flex text-sm bg-red-700 rounded-full focus:ring-4 focus:ring-red-600 transition duration-150" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img src="{{ asset(auth()->user()->profile_image ? 'storage/' . auth()->user()->profile_image : 'img/user.jpeg') }}" alt="Profile Picture" class="w-10 h-10 rounded-full object-cover object-center">
                    </button>
                    <div class="z-50 hidden w-48 text-base list-none bg-red-900 divide-y divide-red-700 rounded-lg shadow-lg transition-all duration-200" id="user-dropdown">
                        <div class="px-4 py-3">
                            @auth
                                <span class="block text-md text-red-200">{{ Auth::user()->nama }}</span>
                                <span class="block text-sm text-red-400">{{ Auth::user()->email }}</span>
                                <span class="block text-sm {{ Auth::user()->status == 'Guru' ? 'text-red-300' : (Auth::user()->status == 'Murid' ? 'text-yellow-400' : 'text-green-400') }}">{{ Auth::user()->status }}</span>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="bg-red-600 text-white font-bold py-2 px-4 ml-6 rounded hover:bg-red-700 transition duration-150">Login</a>
                            @endguest
                        </div>
                        <ul class="py-2">
                            <li>
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-red-300 hover:bg-red-800 transition duration-150"><i class="fa-solid fa-address-card"></i> Pengaturan Profile</a>
                            </li>
                            <li>
                                <a href="#" onclick="openLogoutDialog()" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-800 transition duration-150"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 max-sm:hidden transition duration-150">Login</a>
            @endif
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-red-900 border-r border-red-700 sm:translate-x-0 shadow-lg" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/admin" class="flex items-center p-2 text-red-200 rounded-lg hover:bg-red-800 group transition duration-150">
                    <svg class="w-5 h-5 text-red-400 group-hover:text-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/create-user" class="flex items-center p-2 text-red-200 rounded-lg hover:bg-red-800 group transition duration-150">
                    <svg class="w-5 h-5 text-red-400 group-hover:text-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Tambah Pengguna</span>
                </a>
            </li>
            <li>
                <a href="/laporan" class="flex items-center p-2 text-red-200 rounded-lg hover:bg-red-800 group transition duration-150">
                    <svg class="w-5 h-5 text-red-400 group-hover:text-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 0a4 4 0 0 0-4 4v16a4 4 0 0 0 4 4h16a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4Zm0 1h16a3 3 0 0 1 3 3v16a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Zm8 7a1 1 0 0 0-1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0-1-1Zm-2-5a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2H9Zm-2 5a1 1 0 0 0 0 2h10a1 1 0 0 0 0-2H7Zm2 5a1 1 0 0 0 0 2h4a1 1 0 0 0 0-2H9Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-red-200 transition duration-75 rounded-lg group hover:bg-red-800" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="w-5 h-5 text-red-400 transition duration-75 group-hover:text-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M4 0h12v2H4V0Zm0 6h8v2H4V6Zm0 6h12v2H4v-2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Analitik</span>
                    <svg class="w-3 h-3 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/users-analistik" class="flex items-center w-full p-2 text-red-200 transition duration-75 rounded-lg pl-11 group hover:bg-red-800">
                            <i class="fa-solid fa-users fa-lg text-red-400 group-hover:text-red-200 transition duration-150"></i>
                            <span class="flex-1 ms-3">Users Analystic</span>
                        </a>
                    </li>
                    <li>
                        <a href="/fav-analistik" class="flex items-center w-full p-2 text-red-200 transition duration-75 rounded-lg pl-11 group hover:bg-red-800">
                            <i class="fa-solid fa-star fa-lg text-red-400 group-hover:text-red-200 transition duration-150"></i>
                            <span class="flex-1 ms-3">Favorit Statistic</span>
                        </a>
                    </li>                    
                </ul>
            </li>            
            <li>
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-red-200 rounded-lg hover:bg-red-800 group transition duration-150">
                    <svg class="w-5 h-5 text-red-400 transition duration-75 group-hover:text-red-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11 2a1 1 0 0 0-1 1v5H5a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-5V3a1 1 0 0 0-1-1ZM4 0h12a4 4 0 0 1 4 4v16a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4A4 4 0 0 1 4 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

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
</script>
