<div>
    @if ($modal)
        @include('livewire.material.crear')
    @endif
    {{-- busqueda --}}
    <div class="relative pt-4 mb-4">
        <div class="flex absolute top-0 right-0 items-center justify-center">
            <div class="flex border-2 rounded">
                <input wire:model.lazy='busqueda' type="text" class="px-4 py-2 w-80" placeholder="Search...">
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
    
    {{-- catalogo de LAB --}}
    <section class="text-gray-600 body-font -mt-8">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                {{-- for base de datos --}}
                @foreach ($materiales as $material)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="{{asset('img/multimetro.png')}}">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$material->categoria->nombre}}</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{$material->nombre}}</h2>
                            <button class="mt-1 rounded-xl mx-auto p-2 border-l-black text-white text-xl bg-indigo-500 m-3" wire:click.prevent='ver({{$material->id}})'>solicitar</button>
                        </div>
                    </div>
                @endforeach
                {{ $materiales->links() }}
            </div>
        </div>
    </section>
</div>
