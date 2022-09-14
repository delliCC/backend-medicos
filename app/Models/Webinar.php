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
        'fecha_inicio',
        'descripcion',
        'webinar_url',
        'ficha_nombre',
        'ficha_url',
        'ficha_descripcion',
        'preview_imagen',
        'preview_url',
        'trailer_url',
        'nombre_medico',
        'especialidad',
        'imagen_medico_url',
        'status'
    ];
}
