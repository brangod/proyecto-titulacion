<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = ['detalles',	'recurso_id',	'user_id',	'estado_solicitud_id'];
    /**
     * Relacion de Modelos
     */

    // relacion uno a muchos inverza
    // con USER
    public function user () {
        return $this->belongsTo(User::class);
    }

    //con recurso
    public function recurso () {
        return $this->belongsTo(Recurso::class);
    }

    //con estado
    public function estado(){
        return $this->belongsTo(EstadoSolicitud::class,'estado_solicitud_id');
    }
}
