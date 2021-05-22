<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'modalidad',
        'competicion',
        'localidad',
        'provincia',
        'fecha',
        'distancia_1',
        'distancia_2',
        'distancia_3',
        'juez_arbitro'
    ]; 
    public function atletas()
    {
        return $this->belongsToMany('App\Models\Atleta')->withPivot('tiempo_1','tiempo_2','tiempo_3','tiempo_total','posicion_total','posicion_categoria','puntos','categoria');
    }
    
}
