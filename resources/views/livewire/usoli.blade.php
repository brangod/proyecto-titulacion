<div>
    @if ($modal)
        @include('livewire.solicitudes.cancelar')
    @endif

    @if (session()->has('mensaje'))
    <div class="mt-10 p-4 border-l-4 text-red-500 bg-red-200 border-red-700">
        <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
    </div>
    @endif
    {{-- filtro USUARIOS SOLICITUDES --}}
    <div class="flex justify-end ">
        <div class="-mb-5 xl:w-96">
            <h1 class="py-3 text-lg font-semibold text-gray-600">
                Filtrar por estado
            </h1>
            <select wire:model='filtro'
                class="appearance-none block w-full px-2 py-1.5 text-sm font-normal text-gray-700
                bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                rounded  transition ease-in-out m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                <option selected value="0">Todos</option>
                @foreach ( $estados as $estado )
                <option value='{{$estado->id}}'>{{$estado->nombre}}s</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No. Solicitud
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Recurso
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tipo
                                </th>                                
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $solicitud->id }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $solicitud->recurso->nombre }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $solicitud->recurso->tipo->nombre }}
                                        </p>
                                    </td>

                                    @if ($solicitud->estado_solicitud_id == 3 || $solicitud->estado_solicitud_id == 5)
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-white whitespace-no-wrap text-center px-2 py-1 rounded-xl border-red-900 bg-red-500 text-sm">
                                            {{ $solicitud->estado->nombre }}
                                        </p>
                                    </td>
                                    @else
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-white whitespace-no-wrap text-center px-2 py-1 rounded-xl border-green-900 bg-green-500 text-sm">
                                            {{ $solicitud->estado->nombre }}
                                        </p>
                                    </td>
                                    @endif

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{ $solicitud->updated_at }}
                                        </p>
                                    </td>
                                    @if ($solicitud->estado_solicitud_id == 1)
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button class="text-white whitespace-no-wrap text-center px-2 py-1 rounded-xl border-red-900 bg-red-500 text-sm"
                                        wire:click.prevent='editar({{$solicitud->id}})'>
                                            Cancelar
                                        </button>
                                    </td>
                                    @else
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white"></td>
                                    @endif
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$solicitudes->links()}}
    </div>
</div>
