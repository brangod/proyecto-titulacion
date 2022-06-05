@extends('layouts.plantilla')

@section('contenido')
    <section class="text-gray-600 body-font mt-4">
        <div class="container px-5 m-auto">
            {{-- material --}}
            <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="{{ asset('img/material.png') }}">
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Materiales</h2>
                    <p class="leading-relaxed text-base mb-5">Solicita material para llevar acabo tus practicas</p>
                    <a href="{{ route('dashboard.recurso', 1) }}"
                        class="bg-indigo-600 text-white px-4 py-2 font-bold uppercase rounded-xl">
                        Ver material disponible
                    </a>
                </div>

                {{-- laboratorios --}}
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="{{ asset('img/lab.jpg') }}">
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Laboratorios</h2>
                    <p class="leading-relaxed text-base mb-5">Solicita un laboratorio prestado y realiza todas las pruebas
                        que desees</p>
                    <a href="{{ route('dashboard.recurso', 2) }}"
                        class="bg-indigo-600 text-white px-4 py-2 font-bold uppercase rounded-xl">
                        Ver laboratorios disponibles
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
