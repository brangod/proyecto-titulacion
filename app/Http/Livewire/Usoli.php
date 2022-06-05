<?php

namespace App\Http\Livewire;

use App\Models\Recurso;
use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use Livewire\Component;
use Livewire\WithPagination;

class Usoli extends Component
{
    use WithPagination;

    public $recurso_id, $detalles, $solicitud_id, $usuario_id, $estado_solicitud_id,$rec,$tipo,$cat;
    public $filtro = 0;
    public $modal = false;

    public function render()
    {
        if ($this->filtro > 0) {
            return view('livewire.usoli', ['solicitudes' => Solicitud::where('user_id', auth()->id())
            ->where('estado_solicitud_id', $this->filtro)
            ->orderBy('id','desc')
            ->paginate(5),
            'estados' => EstadoSolicitud::all()]);
        } else {
            return view('livewire.usoli', ['solicitudes' => Solicitud::where('user_id', auth()->id())
            ->where('estado_solicitud_id', '!=', 4)
            ->orderBy('id','desc')
            ->paginate(5),
            'estados' => EstadoSolicitud::all()]);
        }
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }

    public function editar($id)
    {
        $solicitud = Solicitud::find($id);
        $this->solicitud_id = $solicitud->id;
        $this->recurso_id = $solicitud->recurso_id;
        $this->estado_solicitud_id = $solicitud->estado_solicitud_id;
        $this->usuario_id = $solicitud->user_id;
        $this->detalles = $solicitud->detalles;

        $r = Recurso::find($this->recurso_id);
        $this->rec = $r->nombre;
        $this->tipo = $r->tipo->nombre;
        $this->cat = $r->categoria->nombre;
        $this->abrirmodal();
    }
    public function cancelar()
    {
        $soli = Solicitud::find($this->solicitud_id);
        $soli->update([
            'estado_solicitud_id' => 5
        ]);
        session()->flash('mensaje','Solicitud Cancelada');
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function limpiar()
    {
        $this->detalles = '';
        $this->solicitud_id = '';
        $this->recurso_id = '';
        $this->usuario_id = '';
        $this->estado_solicitud_id = '';
        $this->rec = '';
        $this->tipo = '';
        $this->cat = '';
    }

    public function abrirmodal()
    {
        $this->modal = TRUE;
    }
    public function cerrarmodal()
    {
        $this->modal = false;
    }
}
