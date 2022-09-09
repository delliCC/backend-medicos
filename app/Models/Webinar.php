<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webinar extends Model
{
    use HasFactory;

    protected $table = 'webinar';

    protected $fillable = [
        'nombre',
        'url',
        'descripcion',
        'preview_imagen',
        'preview_url',
        'nombre_medico',
        'imagen_medico_url',
        'especialidad',
        'fecha_inicio',
        'status'
    ];
}
