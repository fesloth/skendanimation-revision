@extends('layouts.app')

@section('content')
    @include('partials.sidebar')

    <div class="p-4 sm:ml-64">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 mt-20">Pengguna Analitik</h2>

        <p class="text-lg text-gray-700 mb-6 flex items-center bg-blue-50 border-l-4 border-blue-500 p-4 rounded-md shadow">
            <i class="fa-solid fa-flag text-blue-500 text-3xl mr-3"></i> 
            <span class="font-bold">Total Laporan:</span> 
            <span class="font-bold ml-2 bg-yellow-100 text-yellow-600 px-3 py-1 rounded-lg shadow-md">
                {{ $reportCount }}
            </span>
        </p>        

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pengguna Paling Banyak Login -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center border-b-2 pb-2 border-gray-200">
                    <i class="fa-solid fa-user mr-2 text-red-500"></i> Pengguna Paling Banyak Login
                </h3>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($mostLogins as $user)
                        <li class="text-gray-700 flex items-center">
                            <i class="fa-solid fa-user-circle mr-2 text-gray-500"></i> {{ $user->nama }} 
                            <span class="ml-2 text-sm text-gray-500">({{ $user->logins_count }} login)</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Pengguna Paling Aktif -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center border-b-2 pb-2 border-gray-200">
                    <i class="fa-solid fa-chart-line mr-2 text-blue-500"></i> Pengguna Paling Aktif
                </h3>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($mostActiveUsers as $user)
                        <li class="text-gray-700 flex items-center">
                            <i class="fa-solid fa-user-circle mr-2 text-gray-500"></i> {{ $user->nama }} 
                            <span class="ml-2 text-sm text-gray-500">({{ $user->total_posts }} postingan)</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Pengguna Paling Lama Terdaftar -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center border-b-2 pb-2 border-gray-200">
                    <i class="fa-solid fa-calendar-alt mr-2 text-green-500"></i> Pengguna Paling Lama Terdaftar
                </h3>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($oldestUsers as $user)
                        <li class="text-gray-700 flex items-center">
                            <i class="fa-solid fa-user-circle mr-2 text-gray-500"></i> {{ $user->nama }} 
                            <span class="ml-2 text-sm text-gray-500">(Terdaftar {{ $user->created_at->format('d-m-Y') }})</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Pengguna Paling Banyak Dilaporkan -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center border-b-2 pb-2 border-gray-200">
                    <i class="fa-solid fa-exclamation-triangle mr-2 text-yellow-500"></i> Pengguna Paling Banyak Dilaporkan
                </h3>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($mostReportedUsers as $user)
                        <li class="text-gray-700 flex items-center">
                            <i class="fa-solid fa-user-circle mr-2 text-gray-500"></i> {{ $user->nama }} 
                            <span class="ml-2 text-sm text-gray-500">({{ $user->total_reports }} laporan)</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
