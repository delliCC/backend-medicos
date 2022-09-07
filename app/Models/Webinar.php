<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $table = 'webinar';

    protected $fillable = [
        'nombre',
        'url',
        'descripcion',
        'nombre_medico',
        'imagen_url',
        'especialidad',
        'fecha_inicio',
        'status'
    ];
}
