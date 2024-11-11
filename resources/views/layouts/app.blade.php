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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-black font-montserrat">
    @if (
        !request()->is('login') &&
            !request()->is('register') &&
            !request()->is('admin*') &&
            !request()->is('profile-create') &&
            !request()->routeIs('product-create') &&
            !request()->routeIs('produk.show') &&
            !request()->routeIs('add-content') &&
            !request()->routeIs('content.edit') &&
            !request()->routeIs('login.siswa') &&
            !request()->routeIs('edit.nis') &&
            !request()->routeIs('profile') &&
            !request()->routeIs('create-user') &&
            !request()->routeIs('user-analitik') &&
            !request()->routeIs('fav-analitik') &&
            !request()->routeIs('search-analitik') &&
            !request()->routeIs('laporkan') &&
            !request()->routeIs('user.report'))
        @include('partials.navbar')
    @endif
    @yield('content')
    @if (
        !request()->is('login') &&
            !request()->is('register') &&
            !request()->is('admin*') &&
            !request()->is('profile-create') &&
            !request()->routeIs('product-create') &&
            !request()->routeIs('produk.show') &&
            !request()->routeIs('add-content') &&
            !request()->routeIs('content.edit') &&
            !request()->routeIs('content.show') &&
            !request()->routeIs('login.siswa') &&
            !request()->routeIs('edit.nis') &&
            !request()->routeIs('profile') &&
            !request()->routeIs('create-user') &&
            !request()->routeIs('user-analitik') &&
            !request()->routeIs('fav-analitik') &&
            !request()->routeIs('search-analitik') &&
            !request()->routeIs('laporkan') &&
            !request()->routeIs('user.report'))
        @include('partials.footer')
    @endif
    <script src="../node_modules/preline/dist/preline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
