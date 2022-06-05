<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
    <div class="bg-white px-16 py-14 rounded-md">
        <h1 class="text-xl mb-4 font-bold text-slate-500">Seguro desea cancelar esta solicitud?</h1>
        <form>
        <h1 class="px-2 font-bold text-lg text-gray-600 bg-white">Solicitud</h1>
        <h2 class="px-3 font-medium  text-gray-500 bg-white">{{$solicitud_id}}</h2>
        <h1 class="px-2 font-bold text-lg text-gray-600 bg-white">Recurso</h1>
        <h2 class="px-3 font-medium  text-gray-500 bg-white">{{$rec}}</h2>
        <h1 class="px-2 font-bold text-lg text-gray-600 bg-white">Tipo</h1>
        <h2 class="px-3 font-medium  text-gray-500 bg-white">{{$tipo}}</h2>
        <h1 class="px-2 font-bold text-lg text-gray-600 bg-white">Categoria</h1>
        <h2 class="px-3 font-medium  text-gray-500 bg-white">{{$cat}}</h2>

        <button wire:click.prevent='cerrarmodal()' class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Regresar</button>
        <button wire:click.prevent='cancelar()' class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Continuar</button>
        </form>
    </div>
</div>