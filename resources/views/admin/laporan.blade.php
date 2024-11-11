@extends('layouts.app')

@section('content')
    @include('partials.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col items-center justify-center max-sm:mt-20">
    <div class="container mx-auto mt-32 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl text-font font-bold mb-6 text-center">Laporan Konten</h2>

        <div class="overflow-x-auto mt-5 mb-32">
            <table class="min-w-full bg-white border border-gray-300 shadow-md">
                <thead>
                    <tr>
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
        </div>
    </div>

@endsection
