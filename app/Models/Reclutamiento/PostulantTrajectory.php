<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulantTrajectory extends Model
{
    use HasFactory;
    protected $table = 'rh_postulant_trajectory';
    
    protected $fillable = [
        'id',
        'postulante_id',
        'empresa',
        'fecha_ingreso',
        'fecha_baja',
        'puesto',
        'sueldo',
        'select_carta',
        'select_constancia',
        'motivo_salida',
        'otro_motivo_salida',
        'domicilio_empresa',
        'jefe',
        'puesto_jefe',
        'telefono_jefe'
    ];
}
