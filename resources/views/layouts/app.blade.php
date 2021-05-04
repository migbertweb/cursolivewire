<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- webmanifest --}}
    <link rel="manifest" href="{{ asset('img/icons/site.webmanifest') }}">
    {{-- icons y favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('img/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Global .Inc">
    <meta name="application-name" content="Global .Inc">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="msapplication-config" content="{{ asset('img/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free-5.15.3-web/css/all.min.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="font-mont  text-gray-900 antialiased">
    <x-jet-banner />
    <div class="min-h-screen">
        @livewire('navigation')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')
    @livewireScripts
    <script type="text/javascript">
    Livewire.on('alert', function(message) {
        Swal.fire(
            'Buen Trabajo!',
            message,
            'success'
        )
    })

    </script>
</body>

</html>
