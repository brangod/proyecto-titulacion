<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
    <div class="bg-white px-16 py-14 rounded-md">
        <h1 class="text-xl mb-4 font-bold text-slate-500">Asignacion de Rol</h1>
        <form>
        <h1 class="px-2 font-bold text-lg text-gray-700 bg-white">Nombre</h1>
        <h2 class="px-3 font-medium text-gray-600 bg-white">{{$user->name}}</h2>
        <h1 class="px-2 font-bold text-lg text-gray-700 bg-white">Correo</h1>
        <h2 class="px-3 font-medium text-gray-600 bg-white">{{$user->email}}</h2>
        
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select wire:model='rolname'
                    class="appearance-none block w-full px-2 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                    rounded  transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example">
                    @foreach ( $roles as $rol )
                    <option value='{{$rol->name}}'>{{$rol->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button wire:click.prevent='cerrarmodal()' class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancelar</button>
        <button wire:click.prevent='guardar()' class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Guardar</button>
        </form>
    </div>
</div>