<?php

namespace App\Http\Livewire;

use App\Models\Recurso;
use App\Models\Solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class Laboratorio extends Component
{
    use WithPagination;

    public $busqueda='', $rec, $nombre, $desc, $tipo, $categoria, $estado;
    public $modal=false;

    public function render()
    {
        return view('livewire.laboratorio',['materiales'=>Recurso::where('tipo_id',1)
                                                        ->where('estado_recurso_id',1)
                                                        ->where('nombre','LIKE' , '%'.$this->busqueda.'%')
                                                        ->paginate(8)]);
    }
}
