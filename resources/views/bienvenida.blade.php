<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased">
    <div class="w-3/4 py-6 m-auto bg-white sm:py-8 lg:py-12">
        <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
            <div class="flex flex-col overflow-hidden bg-gray-200 rounded-lg md:h-80 sm:flex-row">
                <!-- image - start -->
                <div class="order-first w-full h-48 bg-gray-300 sm:w-1/2 lg:w-2/5 sm:h-auto sm:order-none">
                    <img src="{{asset('img/bienvenida.jpg')}}"
                        loading="lazy" alt="Bienvenida" class="object-cover object-center w-full h-full" />
                </div>
                <!-- image - end -->

                <!-- content - start -->
                <div class="flex flex-col w-full p-4 sm:w-1/2 lg:w-3/5 sm:p-8">
                    <h2 class="mb-4 text-xl font-bold text-gray-800 md:text-2xl lg:text-4xl">SISTEMA DE PRESTAMO DE MATERIAL</h2>

                    <p class="max-w-md mb-8 text-gray-600">
                        Esta es una aplicacion web desarrollada para poder solicitar material y laboratorio
                        prestado, tambien podras ver las practicas que realizaras en ICE.
                    </p>

                    <div class="mx-auto mt-auto">
                        @auth
                        <a href="{{ route('dashboard.inicio') }}"
                            class="inline-block px-8 py-3 text-sm font-semibold text-center text-white transition duration-100 bg-indigo-500 rounded-lg outline-none hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 md:text-base">
                            Inicio
                        </a>
                        @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-8 py-3 mx-2 text-sm font-semibold text-center text-white transition duration-100 bg-indigo-500 rounded-lg outline-none hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 md:text-base">
                            Log in
                        </a>

                        <a href="{{ route('register') }}"
                            class="inline-block px-8 py-3 mx-2 text-sm font-semibold text-center text-gray-600 transition duration-100 rounded-lg outline-none bg-slate-50 hover:bg-gray-400 focus-visible:ring ring-indigo-400 active:text-gray-800 md:text-base">
                            Register
                        </a>
                    @endauth
                    </div>
                </div>
                <!-- content - end -->
            </div>
        </div>
    </div>
</body>

</html>
