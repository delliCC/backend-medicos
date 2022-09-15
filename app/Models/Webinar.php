<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webinar extends Model
{
    use HasFactory;

    protected $table = 'webinar';

    protected $fillable = [
        'id',
        'nombre',
        'webinar_url',
        'descripcion',
        'ficha_nombre',
        'ficha_url',
        'ficha_descripcion',
        'fecha_inicio',
        'preview_imagen',
        'trailer_url',
        'nombre_medico',
        'imagen_medico_url',
        'especialidad',
        'status'
    ];
}
