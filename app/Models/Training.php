<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training';

    protected $fillable = [
        'id',
        'nombre',
        'training_url',
        'descripcion',
        'fecha_inicio',
        'preview_imagen',
        'trailer_url',
        'nombre_medico',
        'imagen_medico_url',
        'especialidad',
        'status'
    ];
}
