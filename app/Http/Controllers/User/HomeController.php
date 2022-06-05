<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\EstadoRecurso;
use App\Models\Recurso;
use App\Models\Solicitud;
use App\Models\User;
use \Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    //
    use HasRoles;

    public function index()
    {
        $u = User::find(auth()->id());
        $rs = $u->getRoleNames();
        $res=$rs->count();
        //return 'count '.$res . ' val ' . $rs;
        if ($res) {
            if ($rs[0] == 'Admin') {
                return redirect()->route('admin.index');
            } 
            else{
                return view('dashboard.inicio');
            }
        } else {
            return view('dashboard.inicio');
        }
    }

    public function material($mid)
    {
        $idt = Tipo::where('id', $mid)->first();
        $id = $idt->id;
        return view('dashboard.material', compact('id'));
    }

    public function laboratorio()
    {
        return view('dashboard.laboratorio');
    }

    public function historial()
    {
        $solicitudes = Solicitud::where('user_id', auth()->id())->where('estado_solicitud_id', 4)->paginate(5);
        return view('dashboard.historial', compact('solicitudes'));
    }

    public function solicitudes()
    {
        return view('dashboard.solicitudes');
    }
}
