<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    /**
     * Relacion del modelo
     */

    //relacion UNO A MUCHOS solicitudes
    public function solicitudes () {
        return $this->hasMany(Solicitud::class);
    }
}
