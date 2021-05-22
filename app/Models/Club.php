<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefonos',
        'http',
        'mail',
        'facebook',
        'logo',
    ]; 
    
    public function atletas()
    {
        return $this->belongsToMany('App\Models\Atleta')->withPivot('fecha_alta','fecha_baja');
    }
}
