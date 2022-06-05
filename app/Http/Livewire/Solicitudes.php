<?php

namespace App\Http\Livewire;

use App\Models\EstadoSolicitud;
use App\Models\Solicitud;
use Livewire\Component;
use App\Models\Recurso;
use Livewire\WithPagination;

class Solicitudes extends Component
{
    use WithPagination;

    public $detalles, $solicitud_id, $recurso_id, $usuario_id, $estado_solicitud_id;
    public $rec,$tipo,$cat,$soli;
    public $filtro = 0;
    public $soli_id = null;
    public $modalaceptar = false;
    public $modalrechazar = false;
    public $modalfinalizar = false;

    public function render()
    {
        if ($this->soli_id != null) {
            $this->filtro = 0;
            return view('livewire.solicitudes',['solicitudes'=> Solicitud::where('id',$this->soli_id)
                                                                ->paginate(8), 
                                                'estados' => EstadoSolicitud::all()]);
        }
        else{
        if ($this->filtro > 0) {
            return view('livewire.solicitudes',['solicitudes'=> Solicitud::where('estado_solicitud_id',$this->filtro)
                                                                ->orderBy('id','desc')
                                                                ->paginate(8), 
                                                'estados' => EstadoSolicitud::all()]);
        } else {
            return view('livewire.solicitudes',['solicitudes'=> Solicitud::orderBy('estado_solicitud_id','asc')
                                                                ->paginate(8),
                                                'estados' => EstadoSolicitud::all()]);
        }
    }
    }

    public function editaraceptar($id)
    {
        $solicitud = Solicitud::find($id);
        $this->solicitud_id = $solicitud->id;
        $this->recurso_id = $solicitud->recurso_id;
        $this->usuario_id = $solicitud->user_id;
        $this->estado_solicitud_id = $solicitud->estado_solicitud_id;
        $this->detalles = $solicitud->detalles;
        $this->soli = $solicitud->user->name; 

        $r = Recurso::find($this->recurso_id);
        $this->rec = $r->nombre;
        $this->tipo = $r->tipo->nombre;
        $this->cat = $r->categoria->nombre;
        
        $this->modalaceptar = true;
    }

    public function editarrechazar($id)
    {
        $solicitud = Solicitud::find($id);
        $this->solicitud_id = $solicitud->id;
        $this->recurso_id = $solicitud->recurso_id;
        $this->usuario_id = $solicitud->user_id;
        $this->estado_solicitud_id = $solicitud->estado_solicitud_id;
        $this->detalles = $solicitud->detalles;
        $this->soli = $solicitud->user->name; 

        $r = Recurso::find($this->recurso_id);
        $this->rec = $r->nombre;
        $this->tipo = $r->tipo->nombre;
        $this->cat = $r->categoria->nombre;
        
        $this->modalrechazar = true;
    }

    public function editarfinalizar($id)
    {
        $solicitud = Solicitud::find($id);
        $this->solicitud_id = $solicitud->id;
        $this->recurso_id = $solicitud->recurso_id;
        $this->usuario_id = $solicitud->user_id;
        $this->estado_solicitud_id = $solicitud->estado_solicitud_id;
        $this->detalles = $solicitud->detalles;
        $this->soli = $solicitud->user->name; 

        $r = Recurso::find($this->recurso_id);
        $this->rec = $r->nombre;
        $this->tipo = $r->tipo->nombre;
        $this->cat = $r->categoria->nombre;
        
        $this->modalfinalizar = true;
    }

    public function aceptar()
    {
        $so = Solicitud::find($this->solicitud_id);
        $so->update([ 
            'detalles'=>$this->detalles, 
            'estado_solicitud_id' =>2
        ]);
        $r = Recurso::find($this->recurso_id);
        $r->update([
            'estado_recurso_id' =>2
        ]);

        session()->flash('mensaje','Solicitud Aceptada');
        
        $this->modalaceptar = false;
        $this->limpiar();
    }

    public function rechazar()
    {
        $so = Solicitud::find($this->solicitud_id);
        $so->update([ 
            'detalles'=>$this->detalles, 
            'estado_solicitud_id' =>3
        ]);
        session()->flash('mensaje','Solicitud Rechazada');
        $this->modalrechazar = false;
        $this->limpiar();
    }

    public function finalizar()
    {
        $so = Solicitud::find($this->solicitud_id);
        $so->update([ 
            'detalles'=>$this->detalles, 
            'estado_solicitud_id' =>4
        ]);
        $r = Recurso::find($this->recurso_id);
        $r->update([
            'estado_recurso_id' =>1
        ]);
        session()->flash('mensaje','Solicitud Finalizada');
        $this->modalfinalizar = false;
        $this->limpiar();
    }

    public function limpiar()
    {
        $this->detalles=''; 
        $this->id_solicitud=''; 
        $this->recurso_id='';
        $this->usuario_id='';
        $this->estado_solicitud_id='';
        $this->rec = '';
        $this->tipo = '';
        $this->cat = '';  
        $this->soli = '';       
    }
    public function cerrarmodal()
    {
        $this->modalaceptar = false;
        $this->modalrechazar = false;
        $this->modalfinalizar = false;
    }
}
