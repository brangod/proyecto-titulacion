<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipo_id', 'categoria_id', 'estado_recurso_id'];
    /**
     * Relacion de Modelos
     */

    //relacion uno a muchos con solicitud
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }

    // relacion uno a muchos inverza con Tipo, categoria Y Estado
    public function tipo () {
        return $this->belongsTo(Tipo::class);
    }
    public function estado () {
        return $this->belongsTo(EstadoRecurso::class,'estado_recurso_id');
    }
    public function categoria () {
        return $this->belongsTo(Categoria::class);
    }
}
