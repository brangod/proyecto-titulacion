<?php

namespace App\Http\Livewire;

use App\Models\EstadoSolicitud;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EstadoSolicitudes extends Component
{
    public $estado_soli;
    public $nombre, $id_estado_solicitud;
    public $modal=false;
    public function render()
    {
        $this->estado_soli=DB::table('estado_solicituds')->get();
        return view('livewire.estado-solicitudes');
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }
    public function guardar()
    {
        if ($this->id_estado_solicitud=='') {
            EstadoSolicitud::create([
                'nombre'=> $this->nombre
            ]);
        } else {
            $es= EstadoSolicitud::find($this->id_estado_solicitud);
            $es->update([
                'nombre'=> $this->nombre
            ]);
        }
        
        $this->cerrarmodal();
        $this->limpiar();
    }
    public function editar($id)
    {
        $cat= EstadoSolicitud::find($id);
        $this->id_estado_solicitud = $cat->id;
        $this->nombre = $cat->nombre;
        $this->abrirmodal();
    }
    public function eliminar($id)
    {
        EstadoSolicitud::find($id)->delete();
    }
    public function limpiar()
    {
        $this->id_estado_solicitud='';
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
