<div>
    <button wire:click='crear()' class="bg-blue-500 text-white p-3 rounded-xl">Nuevo</button>

    @if ($modal)
        @include('livewire.categorias.crear')
    @endif

    @if (session()->has('mensaje'))
    <div class="mt-5 p-4 border-l-4 text-sky-500 bg-sky-100 border-sky-700">
        <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
    </div>
    @endif
    
    {{-- TABLA DE CATEGORIAS --}}
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    EDITAR
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ELIMINAR
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categorias as $categoria )
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$categoria->id}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$categoria->nombre}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <button wire:click.prevent='editar({{$categoria->id}})' class="text-gray-900 whitespace-no-wrap text-center p-2 rounded-lg bg-yellow-500">
                                        EDITAR
                                    </button>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <button wire:click.prevent='eliminar({{$categoria->id}})' class="text-gray-900 whitespace-no-wrap text-center p-2 rounded-lg bg-red-500">
                                        ELIMINAR
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$categorias->links()}}
    </div>
</div>
