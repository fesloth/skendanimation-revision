@extends('layouts.app')

@section('content')
    <nav class="bg-utama border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-2">
            <a href="/" class="flex items-center space-x-3 max-sm:space-x-1 rtl:space-x-reverse">
                <img src="{{ asset('img/navbar_logoss.png') }}" alt="Default Avatar" width="50" class="max-sm:w-12" />
                <span
                    class="self-center text-white text-2xl font-bold whitespace-nowrap dark:text-white max-sm:text-base">SkendAnimation</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="/admin" class="text-sm  text-white dark:text-white hover:underline">Beranda</a>
                <a href="#" onclick="openLogoutDialog()" class="text-red-700 hover:underline text-sm">
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-32 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl text-font font-bold mb-6 text-center">Laporan Konten</h2>

        <div class="overflow-x-auto mt-5 mb-32">
            <table class="min-w-full bg-white border border-gray-300 shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">ID Laporan</th>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">Pelapor</th>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">Konten yang Dilaporkan
                        </th>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">Alasan</th>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">Deskripsi</th>
                        <th class="py-2 px-4 border bg-theme text-white font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td class="py-2 px-4 border text-center">{{ $report->id }}</td>
                            <td class="py-2 px-4 border text-center">{{ $report->user->nama }}</td>
                            <td class="py-2 px-4 border text-center">
                                @if ($report->content->image)
                                    <img src="{{ asset('storage/' . $report->content->image) }}" alt="Image"
                                        class="mx-auto w-24 sm:w-32">
                                @else
                                    <p class="text-center">Tidak ada gambar</p>
                                @endif
                            </td>
                            <td class="py-2 px-4 border text-center">{{ $report->reason }}</td>
                            <td class="py-2 px-4 border text-center">{{ $report->description ?? 'Tidak ada deskripsi' }}
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <a href="{{ route('content.show', $report->content->id) }}"
                                    class="text-blue-500 hover:underline">Lihat Konten</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
