@extends('layouts.admin')

@section('contenido')
    <h1>Hola Administrador</h1>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$u}}</h2>
                    <p class="leading-relaxed">Usuarios</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$m}}</h2>
                    <p class="leading-relaxed">Materiales</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$l}}</h2>
                    <p class="leading-relaxed">Laboratorios</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$s}}</h2>
                    <p class="leading-relaxed">Solicitudes</p>
                </div>
            </div>
        </div>
    </section>
@endsection
