<div>
    @if ($modal)
        @include('livewire.roles.crear')
    @endif

    @if (session()->has('mensaje'))
    <div class="p-4 border-l-4 text-sky-500 bg-sky-100 border-sky-700">
        <h3 class="text-sm font-medium">{{ session('mensaje') }}</h3>
    </div>
    @endif

    {{-- Busqueda DE USUARIO--}}
    <div class="container mx-auto px-4 sm:px-8 justify-start mt-5 -mb-10">
        <div class="mb-3 xl:w-96">
            <label for="exampleNumber0" class="form-label inline-block mb-2 text-gray-700">Buscar por Nombre o Numero de Boleta</label> <br>
            <input type="text"
                class="form-control w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Nombre" wire:model='buscar'/>
        </div>
    </div>
    {{-- tabla DE USUARIO --}}
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
                                    Boleta
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Rol
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $u )
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$u->id}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$u->name}}
                                    </a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$u->boleta}}
                                    </a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$u->email}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        @php
                                            $rs=$u->roles;                                        
                                            foreach ($rs as $r) {
                                                echo $r->name . '. ';
                                            }
                                        @endphp
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <button wire:click='editar({{$u->id}})' class="text-white whitespace-no-wrap text-center p-2 rounded-lg bg-yellow-500">
                                        EDITAR
                                    </button>
                                </td>  
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href='{{route('admin.usuarios.hist',$u->id)}}' class="text-white whitespace-no-wrap text-center p-2 rounded-lg bg-indigo-500">
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
        {{$users->links()}}
    </div>
</div>
