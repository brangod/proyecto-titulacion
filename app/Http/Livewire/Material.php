<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class Material extends Component
{
    use WithPagination;

    public $tipo_id;
    public $busqueda='', $rec, $nombre, $desc, $tipo, $categoria, $estado;
    public $cat_id = 0;
    public $modal=false;

    public function updatingBusqueda()
    {
        $this->cat_id=0;
        $this->resetPage();
    }
    public function render()
    {
        if ($this->cat_id ==0) {
            return view('livewire.material',['materiales'=>Recurso::where('tipo_id',$this->tipo_id)
                                                        ->where('estado_recurso_id',1)
                                                        ->where('nombre','LIKE' , '%'.$this->busqueda.'%')
                                                        ->paginate(4),
                                        'categorias'=> Recurso::select('categoria_id')->where('tipo_id',$this->tipo_id)
                                        ->distinct()->get()]);
        } else {
            return view('livewire.material',['materiales'=>Recurso::where('tipo_id',$this->tipo_id)
                                                        ->where('estado_recurso_id',1)
                                                        ->where('categoria_id', $this->cat_id)
                                                        ->paginate(4),
                                        'categorias'=> Recurso::select('categoria_id')->where('tipo_id',$this->tipo_id)
                                        ->distinct()->get()]);
        }
    }

    /* para crear soli con modal */
    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }
    
    public function solicitar()
    {
        $soli=Solicitud::where('user_id',auth()->id())
                        ->where('estado_solicitud_id',1)
                        ->orwhere('estado_solicitud_id',2)
                        ->get();
        $cant=$soli->count();
        if ($cant<3) {
            Solicitud::create([
                'recurso_id'=> $this->rec,
                'estado_solicitud_id'=> 1,
                'detalles'=>'',
                'user_id'=>auth()->id()
            ]);
            session()->flash('mensaje','Solicitud realizada con exito, reciba su mterial mostrando el ID de la solicitud');
        } 
        else{session()->flash('mensaje','La solicitud no pudo realizarse, asegurese de tener menos de 3 solicitudes hechas o aceptadas');}
        $this->cerrarmodal();
        $this->limpiar();
        
    }
    public function ver($id)
    {
        $rec= Recurso::find($id);
        $this->rec = $rec->id;
        $this->nombre=$rec->nombre ;
        $this->desc=$rec->descripcion;
        $this->tipo=$rec->tipo->nombre;
        $this->categoria=$rec->categoria->nombre;
        $this->estado=$rec->estado->nombre;
        $this->abrirmodal();
    }
    
    public function limpiar()
    {
        $this->rec='';
        $this->cat_id=0;
        $this->nombre='' ;
        $this->desc='';
        $this->tipo='';
        $this->categoria='';
        $this->estado='';
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
