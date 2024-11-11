@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <form class="bg-[#E7C4C4] shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm" method="POST" action="{{ route('login.siswa') }}">
            @csrf

            <h2 class="text-center text-lg font-bold mb-4">Login Siswa</h2>

            <div class="mb-4 flex items-center">
                <i class="fas fa-user text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                    id="nama" name="nama" type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-4 flex items-center relative">
                <i class="fas fa-id-card text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                    id="password" name="nis" type="password" placeholder="Password" value="{{ old('nis') }}" required>
                    <div id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer"
                    onclick="togglePassword()">
                    <i id="eyeIcon" class="fas fa-eye text-theme"></i>
                </div>
            </div>

            <div class="flex items-center justify-center">
                <button
                    class="bg-theme hover:bg-[#BA7979] text-white font-bold py-2 px-[140px] rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Login
                </button>
            </div>
            @if ($errors->any())
                <div class="mt-4">
                    <ul class="list-disc list-inside text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        eyeIcon.classList.toggle('fa-eye-slash', type === 'text');
        eyeIcon.classList.toggle('fa-eye', type === 'password');
    }
</script>
