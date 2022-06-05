<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
    <div class="bg-white px-16 py-14 rounded-md">
        <h1 class="text-2xl text-center mb-4 font-bold text-slate-700">Solicitar?</h1>
        <form>
        <h1 class="font-bold text-lg text-gray-700 bg-white">Nombre</h1>
        <h2 class="font-semibold text-gray-600 bg-white">{{$nombre}}</h2>
        
        <label class="font-bold text-lg text-gray-700 bg-white">Descripcion</label>
        <h2 class="font-semibold text-gray-600 bg-white">{{$desc}}</h2>        
        
        <label class="font-bold text-lg text-gray-700 bg-white">Tipo</label>
        <h2 class="font-semibold text-gray-600 bg-white">{{$tipo}}</h2> 

        <label class="font-bold text-lg text-gray-700 bg-white">Categoria</label>
        <h2 class="mb-5">{{$categoria}}</h2> 

        <button wire:click.prevent='cerrarmodal()' class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancelar</button>
        <button wire:click.prevent='solicitar()' class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Solicitar</button>
        </form>
    </div>
</div>