<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Componente con todas las clases y etiquetas del Head de HTML5 --}}
<x-head>
    <x-slot name='title_pagina'>
        @yield('page_title', '')
    </x-slot>
</x-head>

<body class="antialiased text-gray-900 font-mont">
    {{-- Componente de Navbar --}}
    @livewire('navigation')
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    {{-- <div class="min-h-screen">
    </div>
    --}}
    {{-- @stack('modals') --}}
    @livewireScripts
    @stack('js')
    {{-- script de alerta para eventos --}}
    <script type="text/javascript">
    Livewire.on('alert', function(message) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 6000,
            toast: true,
            timerProgressBar: true
        })
        // Swal.fire(
        // 'Buen Trabajo!',
        // message,
        // 'success'
        // )

    })

    </script>
    {{-- para alertas comunes --}}
    @if (session('info'))
    <script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{ session('info') }}",
        showConfirmButton: false,
        timer: 6000,
        toast: true
    })

    </script>
    @endif
</body>

</html>
