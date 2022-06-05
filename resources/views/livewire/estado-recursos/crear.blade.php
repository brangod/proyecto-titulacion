<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
    <div class="bg-white px-16 py-14 rounded-md">
        <h1 class="text-xl mb-4 font-bold text-slate-500">Nuevo Estado para los Recursos</h1>
        <form>
        <label class="px-2 font-medium text-gray-600 bg-white">Nombre</label>
        <input type="text" class="block w-full py-2 mb-2 text-base bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" wire:model='nombre'>
        
        <button wire:click.prevent='cerrarmodal()' class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancelar</button>
        <button wire:click.prevent='guardar()' class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Guardar</button>
        </form>
    </div>
</div>