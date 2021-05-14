<x-app-layout>
    @section('page_title', 'Contactanos')
    <header class="w-full bg-center bg-cover h-screen" style="background-image: url({{ asset('img/bg/maxim-ilyahov-0aRycsfH57A-unsplash.jpg') }});">
        <div class="bg-gray-900 bg-opacity-50">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center my-auto md:h-screen md:flex-row">
                    <div class="md:w-1/2">
                        <h2 class="text-2xl font-semibold text-gray-100 text-justify">
                            "Creo que, fundamentalmente, el código abierto tiende a ser un software más estable. Es la manera correcta de hacer las cosas."
                        </h2>
                        <h3 class="text-xl text-white antialiased italic font-semibold text-justify">
                            - Linus Torvalds
                        </h3>
                    </div>
                    <div class="flex mt-8 md:w-1/2 md:justify-end md:mt-0">
                        <div class="max-w-sm bg-white rounded-lg dark:bg-gray-800">
                            <div class="p-4 text-center">
                                <div class="block mt-4">
                                    <h3 class="text-gray-700 dark:text-white">Contactanos:</h3>
                                </div>
                                <x-jet-validation-errors class="mb-4" />
                                <form action="{{ route('contacto.store') }}" method="post">
                                    @csrf
                                    <div>
                                        <x-jet-label for="nombre" value="nombre" />
                                        <x-input class="block mt-1 w-full" type="text" name="nombre" required autofocus />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="correo" value="{{ __('Email') }}" />
                                        <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" required />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="mensaje" value="Mensaje" />
                                        <textarea class="form-control" name="mensaje" cols="30" rows="4" required></textarea>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-reset-button>
                                            Cancelar
                                        </x-reset-button>
                                        <x-button>
                                            Enviar
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
</x-app-layout>
