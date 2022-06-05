<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\EstadoRecurso;
use Livewire\Component;
use App\Models\Recurso;
use App\Models\Solicitud;
use App\Models\Tipo;
use Livewire\WithPagination;

class Recursos extends Component
{
    use WithPagination;

    public $tipos, $categorias, $estados, $t;
    public $id_recurso, $nombre, $descripcion, $tipo_id, $categoria_id, $estado_recurso_id;
    public $modal = FALSE;
    public $busqueda='';
    
    public function mount(){
        $this->tipos = Tipo::all();
        $this->categorias = Categoria::all();
        $this->estados = EstadoRecurso::all();
    }
    public function render()
    {   
        return view('livewire.recursos',['recursos' => Recurso::where('tipo_id',$this->t->id)
                                                    ->where('nombre','like', '%' . $this->busqueda . '%')
                                                    ->paginate(5)]);
    }
    public function updatingBusqueda()
    {
        $this->resetPage();
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }

    public function guardar()
    {
        if ($this->id_recurso=='') {
            Recurso::create([
                'nombre'=> $this->nombre, 
                'descripcion'=>$this->descripcion, 
                'tipo_id'=> $this->tipo_id, 
                'categoria_id'=> $this->categoria_id,
                'estado_recurso_id' =>$this->estado_recurso_id
            ]);
            session()->flash('mensaje','Creado con exito');
        } else {
            $recurso= Recurso::find($this->id_recurso);
            $recurso->update([
                'nombre'=> $this->nombre, 
                'descripcion'=>$this->descripcion, 
                'tipo_id'=> $this->tipo_id, 
                'categoria_id'=> $this->categoria_id,
                'estado_recurso_id' =>$this->estado_recurso_id
            ]);
            session()->flash('mensaje','Actualizado con exito');
        }
        
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function editar($id)
    {
        $recurso= Recurso::find($id);
        $this->id_recurso = $recurso->id;
        $this->nombre = $recurso->nombre;
        $this->descripcion = $recurso->descripcion;
        $this->tipo_id = $recurso->tipo_id;
        $this->categoria_id = $recurso->categoria_id;
        $this->estado_recurso_id = $recurso->estado->id;
        $this->abrirmodal();
    }
    public function eliminar($id)
    {
        $r = Recurso::find($id);
        $so = Solicitud::where('recurso_id',$r->id)->count();
        if ($so) {
            session()->flash('mensaje','Este recurso no puede ser eliminado, ' . $so . ' solicitudes relacionadas');
        } else {
            $r->delete();
            session()->flash('mensaje','Eliminado con exito');
        }
    }
    public function limpiar()
    {
        $this->id_recurso='';
        $this->nombre='' ;
        $this->descripcion=''; 
        $this->tipo_id=''; 
        $this->categoria_id='';
        $this->estado_recurso_id='';
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
