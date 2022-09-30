<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulantReference extends Model
{
    use HasFactory;
    protected $table = 'rh_postulant_reference';
    
    protected $fillable = [
        'id',
        'postulante_id',
        'nombre',
        'ocupacion',
        'parentesco',
        'edad',
        'telefono',
        'domicilio',
    ];
}
