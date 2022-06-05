@extends('layouts.app')

@section('contenido')
<div class="py-6 bg-white sm:py-8 lg:py-12">
    <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
        <div class="flex items-end justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Material</h2>

            <a href="#"
                class="inline-block px-4 py-2 text-sm font-semibold text-center text-gray-500 transition duration-100 bg-white border rounded-lg outline-none hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 md:text-base md:px-8 md:py-3">
                Ver mas...
            </a>
        </div>

        <div class="grid sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-4 md:gap-x-6 gap-y-6">
            <!-- product - start -->
            <div>
                <a href="#" class="block mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group h-80 lg:mb-3">
                    <img src="{{asset('img/multimetro.png')}}"
                        loading="lazy" alt="img"
                        class="object-fill object-center w-full h-full transition duration-200 group-hover:scale-110" />
                </a>

                <div class="flex flex-col">
                    <span class="text-gray-500">Categoria | Disponible 3</span>
                    <a href="#"
                        class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                        Multimetro
                    </a>
                </div>
            </div>
            <!-- product - end -->

            <!-- product - start -->
            <div>
                <a href="#" class="block mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group h-80 lg:mb-3">
                    <img src="{{asset('img/osciloscopio.png')}}"
                        loading="lazy" alt="Photo by engin akyurt"
                        class="object-fill object-center w-full h-full transition duration-200 group-hover:scale-110" />
                </a>

                <div class="flex flex-col">
                    <span class="text-gray-500">Categoria | Disponible 1</span>
                    <a href="#"
                        class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                        Osciloscopio
                    </a>
                </div>
            </div>
            <!-- product - end -->

            <!-- product - start -->
            <div>
                <a href="#" class="block mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group h-80 lg:mb-3">
                    <img src="{{asset('img/generador.jpg')}}"
                        loading="lazy" alt="Photo by Austin Wade"
                        class="object-fill object-center w-full h-full transition duration-200 group-hover:scale-110" />
                </a>

                <div class="flex flex-col">
                    <span class="text-gray-500">Categoria | Disponible 2</span>
                    <a href="#"
                        class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                        Generador de funciones
                    </a>
                </div>
            </div>
            <!-- product - end -->
        </div>
    </div>
</div>

{{-- Laboratorios --}}

<div class="py-6 bg-white sm:py-8 lg:py-12">
    <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
        <div class="flex items-end justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Laboratorio</h2>

            <a href="#"
                class="inline-block px-4 py-2 text-sm font-semibold text-center text-gray-500 transition duration-100 bg-white border rounded-lg outline-none hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 md:text-base md:px-8 md:py-3">
                Ver mas...
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-6">
            <!-- product - start -->
            <div>
                <a href="#" class="block mb-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg group h-80 lg:mb-3">
                    <img src="{{asset("img/lab.jpg")}}"
                        loading="lazy" alt="Photo by Austin Wade"
                        class="object-fill object-center w-full h-full transition duration-200 group-hover:scale-110" />
                </a>

                <div class="flex flex-col">
                    <span class="text-gray-500">Categoria</span>
                    <a href="#"
                        class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                        Lab 1
                    </a>
                </div>
            </div>
            <!-- product - end -->
        </div>
    </div>
</div>
@endsection