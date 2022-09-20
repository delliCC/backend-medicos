<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'id',
        'numero_empleado_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'telefono',
        'direccion',
        'pais',
        'estado',
        'municipio',
        'status'
    ];
}
