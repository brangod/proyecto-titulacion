<div>
    @if ($modalaceptar)
        @include('livewire.solicitudes.aceptar')
    @endif
    @if ($modalrechazar)
        @include('livewire.solicitudes.rechazar')
    @endif
    @if ($modalfinalizar)
        @include('livewire.solicitudes.finalizar')
    @endif

    @if (session()->has('mensaje'))
        <div class="mt-10 p-4 border-l-4 text-sky-700 bg-sky-50 border-sky-700">
            <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
        </div>
    @endif
    <div class="justify-start mt-10 -mb-10">
        <div class="mb-3 xl:w-96">
            <label for="exampleNumber0" class="form-label inline-block mb-2 text-gray-700">Buscar por ID</label>
            <input type="number"
                class="form-control w-1/3 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Id Solicitud" wire:model='soli_id' />
        </div>
    </div>

    {{-- filtro --}}
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
                @foreach ($estados as $estado)
                    <option value='{{ $estado->id }}'>{{ $estado->nombre }}s</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- TABLA DE Solicitudes ADMIN --}}
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
                                    Recurso
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Usuario
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Detalles
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ...
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ...
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
                                            {{ $solicitud->user->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $solicitud->detalles }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $solicitud->estado->nombre }}
                                        </p>
                                    </td>

                                    @if ($solicitud->estado_solicitud_id == 1)
                                        @if ($solicitud->recurso->estado->id == 1)
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <button wire:click.prevent='editaraceptar({{ $solicitud->id }})'
                                                    class="text-white whitespace-no-wrap text-center p-2 rounded-lg bg-green-500">
                                                    Aceptar
                                                </button>
                                            </td>
                                        @else
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <button disabled
                                                    class="text-white whitespace-no-wrap text-center p-2 rounded-lg bg-gray-500">
                                                    Recurso Ocupado
                                                </button>
                                            </td>
                                        @endif
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <button wire:click.prevent='editarrechazar({{ $solicitud->id }})'
                                                class="text-white whitespace-no-wrap text-center p-2 rounded-lg bg-red-500">
                                                Rechazar
                                            </button>
                                        </td>
                                    @else
                                        @if ($solicitud->estado_solicitud_id == 2)
                                            <td colspan="2"
                                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <button wire:click.prevent='editarfinalizar({{ $solicitud->id }})'
                                                    class="text-white whitespace-no-wrap text-center px-6 py-2 rounded-lg bg-blue-500">
                                                    Finalizar
                                                </button>
                                            </td>
                                        @else
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                            </td>
                                        @endif
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $solicitudes->links() }}
    </div>
</div>
