<x-app-layout>
    @section('page_title', 'Inicio')
    <header class="w-full bg-center bg-cover h-screen" style="background-image: url({{ asset('img/bg/arpad-czapp-2t6st8T_J3k-unsplash.jpg') }});">
        <div class="bg-gray-900 bg-opacity-50">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center my-auto md:h-screen md:flex-row">
                    <div class="md:w-1/2">
                        <h2 class="text-2xl font-semibold text-gray-100 text-justify">
                            "La mayoría de los buenos programadores programan, no porque esperan que se les pague o por adulación por parte del público, sino porque es divertido programar."
                        </h2>
                        <h3 class="text-xl text-white antialiased italic font-semibold text-justify">
                            - Linus Torvalds
                        </h3>
                    </div>
                    @guest
                    <div class="flex mt-8 md:w-1/2 md:justify-end md:mt-0">
                        <div class="max-w-sm bg-white rounded-lg dark:bg-gray-800">
                            <div class="p-5 text-center">
                                <h3 class="text-gray-700 dark:text-white">Iniciar sesion</h3>
                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                    </div>
                                    <div class="block mt-4">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                        @endif
                                        <x-jet-button class="ml-4">
                                            {{ __('Log in') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
</x-app-layout>
