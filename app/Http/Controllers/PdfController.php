<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use App\Models\Solicitud;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //
    public function usuario_historial()
    {   
        $historial = Solicitud::where('user_id', auth()->id())->where('estado_solicitud_id', 4)->get();
        $user = User::find(auth()->id());
        $pdf = PDF::loadView('pdf.usuario_historial', compact('historial','user'));
        return $pdf->download('mi_historial.pdf');
    }

    public function material_historial($m_id)
    {
        $historial=Solicitud::where('recurso_id',$m_id)->where('estado_solicitud_id',4)->paginate();
        $m = Recurso::find($m_id);
        $pdf = PDF::loadView('pdf.material_historial', compact('historial','m'));
        return $pdf->download('historial_material.pdf');
    }

    public function admin_uhist($u_id)
    {
        $historial=Solicitud::where('user_id',$u_id)->orderBy('updated_at','desc')->paginate();
        $user = User::find($u_id);
        $pdf = PDF::loadView('pdf.admin_uhist', compact('historial','user'));
        return $pdf->download('usuario_historial.pdf');
    }
    public function lista_recursos($tipo_id)
    {
        $historial = Recurso::with(['tipo','categoria','estado'])->where('tipo_id', $tipo_id)->paginate();
        $tipo = Tipo::find($tipo_id);
        $pdf = PDF::loadView('pdf.lista_recursos', compact('historial','tipo'));
        return $pdf->download('solicitud.pdf');
    }
}
