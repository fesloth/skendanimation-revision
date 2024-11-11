@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <form class="bg-[#E7C4C4] shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-sm:bg-white max-sm:w-96 max-w-sm"
            method="POST" action="{{ route('login') }}">
            @csrf

            <h2 class="text-center text-lg font-bold mb-4">Login</h2>

            @if (Session::has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ Session::get('success') }}</span>
                    </div>
                </div>
            @endif
            <div class="mb-4 flex items-center">
                <i class="fas fa-envelope text-white leading-tight rounded-l-md bg-theme p-[9px]"></i>
                <input
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme"
                    id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4 flex items-center relative">
                <i class="fas fa-key text-white leading-tight rounded-l-md bg-theme p-[8.8px]"></i>
                <input id="password" name="password" type="password" placeholder="Password"
                    class="shadow appearance-none border rounded-r-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-theme focus:ring-theme pr-10"
                    required>
                <div id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer"
                    onclick="togglePassword()">
                    <i id="eyeIcon" class="fas fa-eye text-theme"></i>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <button
                    class="bg-theme hover:bg-[BA7979] text-white font-bold py-2 px-[140px] rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Login
                </button>
            </div>
            <p class="mt-4 text-end text-gray-700">
                Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
            </p>
            <p class="mt-1 text-end text-gray-700">
                <a href="{{ route('login.siswa') }}" class="text-blue-500 hover:underline">Masuk sebagai siswa</a>
            </p>            
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
