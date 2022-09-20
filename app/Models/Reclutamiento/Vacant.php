<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $table = 'rh_vacant';
    
    protected $fillable = [
        'id',
        'imagen_url',
        'puesto_id',
        'sucursal_id',
        'cantidad',
        'requisitos',
        'funcion',
        'salario',
        'prestaciones',
        'horario',
        'lugar_trabajo',
        'reclutador_id',
        'status',
    ];
}
