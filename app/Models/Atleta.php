<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Atleta extends Model
{
    use HasFactory;
    protected $fillable = [
        'sexo',
        'nombre',
        'apellido_1',
        'apellido_2',
    ];

    public function clubs(){
        return $this->belongsToMany('App\Models\Club')->withPivot('fecha_alta','fecha_baja');
    }    
    public function carreras(){
        return $this->belongsToMany('App\Models\Carrera')->withPivot('tiempo_1','tiempo_2','tiempo_3','tiempo_total','posicion_total','posicion_categoria','puntos','categoria');
    }  
}

