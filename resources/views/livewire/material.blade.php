<div>
    {{-- mensaje de session --}}
    @if (session()->has('mensaje'))
        <div class="p-4 border-l-4 text-sky-700 bg-sky-50 border-sky-700">
            <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
        </div>
    @endif

    {{-- busqueda DE MATERIAL --}}
    <div class="relative h-20">
        {{-- filtro select --}}
        <div class="absolute top-0 left-0">
            <div class="xl:w-44">
                <h1 class="text-lg font-semibold text-gray-600">
                    Filtrar categoria
                </h1>
                <select wire:model='cat_id'
                    class="appearance-none block w-full px-2 py-1.5 text-sm font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                    rounded  transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option selected value="0">Todos</option>
                    @foreach ($categorias as $cat)
                        <option value='{{ $cat->categoria->id }}'>{{ $cat->categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- buscador --}}
        <div class="absolute right-0 top-2">
            <div class="flex border-2 rounded">
                <input wire:model.lazy='busqueda' type="text" class=" xl:w-80" placeholder="Buscar nombre">
                <button class="flex items-center justify-center px-4 border-l">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
    
    {{-- letrero sin resultados --}}
    @if ($materiales->count() == 0)
        <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                <div class="flex flex-col items-center">
                    <h1 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">Sin resultados</h1>

                    <p class="max-w-screen-md mb-12 text-center text-gray-500 md:text-lg">
                        Sin disponibilidad, Intentelo mas tarde
                    </p>

                </div>
            </div>
        </div>
    @endif

    {{-- catalogo de recursos --}}
    <section class="mt-5 text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                {{-- for base de datos --}}
                @foreach ($materiales as $material)
                    <div class="w-full p-4 lg:w-1/4 md:w-1/2">
                        <a class="block h-48 overflow-hidden rounded">
                            @if ($material->tipo->id == 1)
                                <img alt="material" class="block object-cover object-center w-full h-full"
                                    src="{{ asset('img/material.png') }}">
                            @else
                                <img alt="lab" class="block object-cover object-center w-full h-full"
                                    src="{{ asset('img/lab.jpg') }}">
                            @endif
                        </a>
                        <div class="relative h-56 mt-4 border-b ">
                            <h3 class="mb-1 text-xs tracking-widest text-gray-500 title-font">
                                {{ $material->categoria->nombre }}</h3>
                            <h2 class="text-lg font-medium text-gray-900 title-font">{{ $material->nombre }}</h2>
                            <h3 class="mb-1 text-xs tracking-widest text-gray-500 title-font">
                                {{ $material->descripcion }}</h3>
                            <div class="text-justify">
                                @if ($material->tipo->id == 1)
                                    <button
                                        class="absolute bottom-0 p-2 m-3 mx-auto text-lg font-semibold text-white bg-indigo-500 rounded-xl right-1/3"
                                        wire:click.prevent='ver({{ $material->id }})'>solicitar
                                    </button>
                                @else
                                    <h3 class="mb-1 text-xs tracking-widest text-gray-500 title-font">
                                        Para el prestamo de Laboratorio es necesario rol de maestro
                                    </h3>
                                    @can('user.laboratorios')
                                        <button
                                            class="absolute bottom-0 p-2 m-3 mx-auto text-lg font-semibold text-white bg-indigo-500 rounded-xl right-1/3"
                                            wire:click.prevent='ver({{ $material->id }})'>solicitar
                                        </button>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{ $materiales->links() }}
    @if ($modal)
    @include('livewire.material.crear')
@endif
</div>
