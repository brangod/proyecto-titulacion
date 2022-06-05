<?php

namespace App\Http\Livewire;

use App\Models\EstadoRecurso;
use Livewire\Component;

class EstadoRecursos extends Component
{
    public $estado_recursos;
    public $nombre, $id_estado_recursos;
    public $modal=false;

    public function render()
    {
        $this->estado_recursos=EstadoRecurso::all();
        return view('livewire.estado-recursos');
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }
    public function guardar()
    {
        if ($this->id_estado_recursos=='') {
            EstadoRecurso::create([
                'nombre'=> $this->nombre
            ]);
        } else {
            $es= EstadoRecurso::find($this->id_estado_recursos);
            $es->update([
                'nombre'=> $this->nombre
            ]);
        }
        
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function editar($id)
    {
        $cat= EstadoRecurso::find($id);
        $this->id_estado_recursos = $cat->id;
        $this->nombre = $cat->nombre;
        $this->abrirmodal();
    }
    public function eliminar($id)
    {
        EstadoRecurso::find($id)->delete();
    }
    public function limpiar()
    {
        $this->id_estado_recursos='';
        $this->nombre='' ;
    }
    public function abrirmodal()
    {
        $this->modal=TRUE;
    }
    public function cerrarmodal()
    {
        $this->modal=false;
    }
}

