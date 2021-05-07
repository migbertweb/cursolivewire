<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Componente con todas las clases y etiquetas del Head de HTML5 --}}
<x-head />

<body class="antialiased text-gray-900 font-mont">
    <div class="min-h-screen">
        {{-- Componente de Navbar --}}
        @livewire('navigation')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    {{-- @stack('modals') --}}
    @livewireScripts
    {{-- script de alerta para eventos --}}
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
