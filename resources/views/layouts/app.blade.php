<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head />

<body class="antialiased text-gray-900 font-mont">
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
