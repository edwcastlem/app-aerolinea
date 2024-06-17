<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Admin Aerolínea' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/8406e27b66.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/aerolinea.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('layouts.admin.sidebar')

    <main class="p-4 sm:ml-64">
        @include('layouts.admin.header', $linksBreadcrumb ?? ['linksBreadcrumb' => []])

        {{ $slot }}
    </main>


    @stack('scripts')
</body>

</html>
