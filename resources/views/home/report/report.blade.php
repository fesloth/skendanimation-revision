@extends('layouts.app')

@section('content')
<div class="max-w-2xl mt-32 mx-auto mb-10 bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Laporkan Konten: {{ $content->title }}</h1>

    <form action="{{ route('reports.store', $content->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="reason" class="block text-sm font-medium text-gray-700">Alasan Pelaporan</label>
            <select name="reason" id="reason" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="NSFW">Berunsur NSFW</option>
                <option value="Penghinaan">Berisi Penghinaan</option>
                <option value="Konten Sensitif">Konten Sensitif/membuat tidak nyaman</option>
                <option value="Plagiarisme">Konten milik author lain</option>
                <option value="Others">Lainnya</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi (opsional)</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>
        <div class="flex justify-between">
        <div class="flex">
            <a class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700" href="/blog">Batalkan Laporan</a>
        </div>
        <div class="flex">
            <button type="submit" class="bg-theme text-white px-4 py-2 rounded-lg hover:bg-hoverTheme">Kirim Laporan</button>
        </div>
    </div>
    </form>
</div>
@endsection
