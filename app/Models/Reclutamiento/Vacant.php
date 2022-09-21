<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Employees;
use Illuminate\Database\Eloquent\Model;
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
        'lugar_trabajo',
        'reclutador_id',
        'status',
    ];

    public function empleado()
    {
        return $this->belongsTo(Employees::class, 'reclutador_id');
    }
}
