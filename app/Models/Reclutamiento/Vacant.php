<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Puestos;
use App\Models\Reclutamiento\Employees;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reclutamiento\Sucursales;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'reclutador_id',
        'status',
    ];

    public function empleado()
    {
        return $this->belongsTo(Employees::class, 'reclutador_id');
    }

    public function puesto()
    {
        return $this->belongsTo(Puestos::class, 'puesto_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursales::class, 'sucursal_id');
    }
}
