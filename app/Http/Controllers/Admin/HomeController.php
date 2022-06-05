<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recurso;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $u = User::count();
        $m = Recurso::where('tipo_id',1)->count();
        $l = Recurso::where('tipo_id',2)->count();
        $s = Solicitud::count();
        return view('admin.index',compact('u','m','l','s'));
    }
    public function categorias(){
        return view('admin.categorias');
    }
    public function solicitud(){
        return view('admin.solicitudes');
    }
    public function tipo(){
        return view('admin.tipos');
    }

    public function usuarios(){
        return view('admin.usuarios');
    }

    public function uhist($id_user){
        $historial = Solicitud::where('user_id',$id_user)->get();
        $user = User::find($id_user);
        return view('admin.usuario-historial', compact('historial','user'));
    }

    public function estado_recursos(){
        return view('admin.estado-recursos');
    }
    public function estado_solicitudes(){
        return view('admin.estado-solicitudes');
    }

    public function hist($id){
        $hist=Solicitud::where('recurso_id',$id)->where('estado_solicitud_id',4)->paginate();
        return view('admin.historial',compact('hist','id'));
        
    }
}
