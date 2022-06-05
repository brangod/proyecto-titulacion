<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoRecurso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    /**
     * Relacion del modelo
     */

    //relacion UNO A MUCHOS RECURSOS
    public function recursos () {
        return $this->hasMany(Recurso::class);
    }
}
