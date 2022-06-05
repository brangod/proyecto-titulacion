<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
    <div class="bg-white px-16 py-14 rounded-md">
        <h1 class="text-xl mb-4 font-bold text-slate-500">Nuevo</h1>
        <form>
        <label class="px-2 font-medium text-gray-600 bg-white">Nombre {{$id_recurso}}</label>
        <input type="text" class="block w-full py-2 mb-2 text-base bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" wire:model='nombre'>
        
        <label class="px-2 font-medium text-gray-600 bg-white">Descripcion</label>
        <input type="text" class="block w-full py-2 mb-2 text-base bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" wire:model='descripcion'>
        
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select wire:model='tipo_id'
                    class="appearance-none block w-full px-2 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                    rounded  transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example">
                    <option selected>Tipo</option>
                    @foreach ( $tipos as $tipo )
                    <option value='{{$tipo->id}}'>{{$tipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select wire:model='categoria_id'
                    class="appearance-none block w-full px-2 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                    rounded  transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example">
                    <option selected>Categoria</option>
                    @foreach ( $categorias as $categoria )
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select wire:model='estado_recurso_id'
                    class="appearance-none block w-full px-2 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                    rounded  transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example">
                    <option selected>Estado</option>
                    @foreach ( $estados as $estado )
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button wire:click.prevent='cerrarmodal()' class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancelar</button>
        <button wire:click.prevent='guardar()' class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Guardar</button>
        </form>
    </div>
</div>
