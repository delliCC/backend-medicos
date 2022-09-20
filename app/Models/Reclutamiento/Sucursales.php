<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;

    protected $table = 'rh_vacant';
    
    protected $fillable = [
        'id',
        'sucursal',
        'correo',
        'telefono',
        'direccion',
        'pais',
        'estado',
        'municipio',
        'status',
    ];
}
