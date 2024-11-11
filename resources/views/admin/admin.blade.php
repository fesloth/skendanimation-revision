@extends('layouts.app')

@section('content')
    @include('partials.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="flex flex-col mt-32 max-sm:mt-20">
        <h2 class="text-3xl font-bold mb-6 text-font text-center max-sm:text-2xl">Admin Dashboard</h2>
        <div class="mb-4 pl-24 mx-32 sm:ml-4">
                <input type="text" id="userSearch" placeholder="Cari nama pengguna..." 
                    class="border p-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-[#BA7979] focus:border-[#9E1111] w-full"
                    style="border-color: #9E1111; color: #814C4C;" />
        </div>
        </div>
        <div class="flex flex-col items-center justify-center">
            <div class="overflow-x-auto max-w-full">
                <table class="bg-white border border-gray-300 shadow-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">ID</th>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">Nama</th>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">Email</th>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">Status</th>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">Laporan</th>
                            <th class="py-2 px-3 max-sm:text-sm border font-bold bg-theme text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        @foreach ($users as $user)
                            <tr class="max-sm:text-center">
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->id }}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->nama }}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->email }}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->status }}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">
                                    @php
                                        $hasReport = \App\Models\Report::where('user_id', $user->id)->exists();
                                    @endphp
                                    @if ($hasReport)
                                        <span class="text-red-600">Ada laporan</span>
                                    @else
                                        <span class="text-green-600">Tidak ada laporan</span>
                                    @endif
                                </td>
                                <td
                                    class="py-2 px-3 max-sm:p-1 max-sm:text-sm border flex flex-row gap-2 justify-center items-center max-sm:flex max-sm:flex-col max-sm:gap-2">
                                    <button onclick="window.location.href='{{ route('edit.user', ['id' => $user->id]) }}'"
                                        class="bg-yellow-300 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-yellow-400 focus:outline-none focus:shadow-outline-blue">
                                        <i class="fas fa-edit mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Edit</p>
                                    </button>
                                    <button onclick="confirmDelete('{{ route('delete.user', ['id' => $user->id]) }}')"
                                        class="bg-red-600 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                        <i class="fas fa-trash-alt mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Hapus</p>
                                    </button>
                                    <button onclick="window.location.href='{{ route('user.report', ['id' => $user->id]) }}'"
                                        class="bg-blue-600 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <i class="fas fa-flag mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Laporan</p>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

    <div id="confirmation-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div id="alert-additional-content-2"
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
                    Apakah Anda yakin ingin menghapus user ini?
                </div>
                <div class="flex">
                    <button type="button" onclick="deleteUser('URL_DEL_USER')"
                        class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Hapus
                    </button>
                    <button type="button" onclick="closeConfirmationDialog()"
                        class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

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
                        class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Keluar
                    </button>
                    <button type="button" onclick="closeLogoutDialog()"
                        class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('userSearch').addEventListener('keyup', function() {
            let query = this.value;

            fetch(`/search-users?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    let userTableBody = document.getElementById('userTableBody');
                    userTableBody.innerHTML = ''; // Clear the table body

                    data.users.forEach(user => {
                        userTableBody.innerHTML += `
                            <tr class="max-sm:text-center">
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">${user.id}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">${user.nama}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">${user.email}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">${user.status}</td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">
                                    ${user.has_report ? '<span class="text-red-600">Ada laporan</span>' : '<span class="text-green-600">Tidak ada laporan</span>'}
                                </td>
                                <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border flex flex-row gap-2 justify-center items-center max-sm:flex max-sm:flex-col max-sm:gap-2">
                                    <button onclick="window.location.href='{{ url('edit/user') }}/' + user.id" class="bg-yellow-300 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-yellow-400 focus:outline-none focus:shadow-outline-blue">
                                        <i class="fas fa-edit mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Edit</p>
                                    </button>
                                    <button onclick="confirmDelete('{{ url('delete/user') }}/' + user.id)" class="bg-red-600 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                        <i class="fas fa-trash-alt mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Hapus</p>
                                    </button>
                                    <button onclick="window.location.href='{{ url('user/report') }}/' + user.id" class="bg-blue-600 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <i class="fas fa-flag mr-2 max-sm:mr-0"></i>
                                        <p class="max-sm:hidden">Lihat Laporan</p>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                });
        });

        function confirmDelete(url) {
            var confirmationDialog = document.getElementById("confirmation-dialog");
            if (confirmationDialog) {
                confirmationDialog.style.display = "block";
            }

            var deleteButton = confirmationDialog.querySelector('.bg-red-800');
            deleteButton.onclick = function() {
                window.location.href = url;
            };
        }

        function closeConfirmationDialog() {
            var confirmationDialog = document.getElementById("confirmation-dialog");
            if (confirmationDialog) {
                confirmationDialog.style.display = "none";
            }
        }

        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }

        function closeLogoutDialog() {
            var logoutDialog = document.getElementById("logout-dialog");
            if (logoutDialog) {
                logoutDialog.style.display = "none";
            }
        }

        function openLogoutDialog() {
            var logoutDialog = document.getElementById("logout-dialog");
            if (logoutDialog) {
                logoutDialog.style.display = "block";
            }
        }
    </script>
@endsection
