<?php

namespace App\Http\Livewire;

use App\Models\Tipo;
use Livewire\Component;

class Tipos extends Component
{
    public $tipos;
    public $nombre, $id_tipo;
    public $modal=false;

    public function render()
    {
        $this->tipos=Tipo::all();
        return view('livewire.tipos');
    }
    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }
    
    public function guardar()
    {
        if ($this->id_tipo=='') {
            Tipo::create([
                'nombre'=> $this->nombre
            ]);
        } else {
            $cat= Tipo::find($this->id_tipo);
            $cat->update([
                'nombre'=> $this->nombre
            ]);
        }
        
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function editar($id)
    {
        $cat= Tipo::find($id);
        $this->id_tipo = $cat->id;
        $this->nombre = $cat->nombre;
        $this->abrirmodal();
    }
    public function eliminar($id)
    {
        Tipo::find($id)->delete();
    }
    public function limpiar()
    {
        $this->id_tipo='';
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
