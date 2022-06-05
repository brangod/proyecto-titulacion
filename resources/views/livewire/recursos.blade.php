<div>
        <button wire:click='crear()' class="p-3 mb-5 ml-10 text-white bg-blue-500 xl:-mb-2 2xl:-mb-5 rounded-xl">Nuevo</button>
        <div class="w-full h-14 ">
        <div class="flex items-center justify-center pt-3 mx-auto">
            <div class="flex border-2 border-gray-200 rounded">
                <input wire:model.lazy='busqueda' type="text" class="px-4 py-2 w-80" placeholder="Buscar...">
                <button class="px-4 text-white bg-gray-600 border-l ">
                    Buscar
                </button>
            </div>
        </div>
    </div>
    @if ($modal)
        @include('livewire.recursos.crear')
    @endif
    @if (session()->has('mensaje'))
    <div class="p-4 mt-5 border-l-4 text-sky-500 bg-sky-100 border-sky-700">
        <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
    </div>
    @endif
    
    {{-- TABLA DE RECURSOS ADMIN--}}
    <div class="container px-4 mx-auto sm:px-8">
        <div class="pb-8">
            <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Nombre
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Descripcion
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Tipo
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Categoria
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Estado
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    EDITAR
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    ELIMINAR
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Ver<br>Historial
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($recursos as $recurso )
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->id}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->nombre}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->descripcion}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->tipo->nombre}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->categoria->nombre}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-center text-gray-900 whitespace-no-wrap">
                                        {{$recurso->estado->nombre}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <button wire:click.prevent='editar({{$recurso->id}})' class="p-2 text-center text-white whitespace-no-wrap bg-yellow-500 rounded-lg">
                                        EDITAR
                                    </button>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <button wire:click.prevent='eliminar({{$recurso->id}})' class="p-2 text-center text-white whitespace-no-wrap bg-red-500 rounded-lg">
                                        ELIMINAR
                                    </button>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <a href="{{route('admin.historial',$recurso->id)}}" class="p-2 text-center text-white whitespace-no-wrap bg-indigo-600 rounded-lg">
                                        Historial
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$recursos->links()}}
    </div>
</div>
