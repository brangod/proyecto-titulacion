<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Recurso;
use Livewire\Component;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;
    //public $categorias;
    public $nombre, $id_categoria;
    public $modal=false;

    public function render()
    {
        return view('livewire.categorias',['categorias'=>Categoria::paginate(8)]);
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }
    public function guardar()
    {
        if ($this->id_categoria=='') {
            Categoria::create([
                'nombre'=> $this->nombre
            ]);
            session()->flash('mensaje','Categoria creada con exito');
        } else {
            $cat= Categoria::find($this->id_categoria);
            $cat->update([
                'nombre'=> $this->nombre
            ]);
            session()->flash('mensaje','Categoria actualizada');
        }
        
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function editar($id)
    {
        $cat= Categoria::find($id);
        $this->id_categoria = $cat->id;
        $this->nombre = $cat->nombre;
        $this->abrirmodal();
    }
    public function eliminar($id)
    {
        $c =Categoria::find($id);
        $so = Recurso::where('categoria_id',$c->id)->count();
        if ($so) {
            session()->flash('mensaje','Esta categoria no puede ser eliminado, ' . $so . ' recursos relacionados');
        } else {
            $c->delete();
            session()->flash('mensaje','Eliminado con exito');
        }
    }
    public function limpiar()
    {
        $this->id_categoria='';
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
