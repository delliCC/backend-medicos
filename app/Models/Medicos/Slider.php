<?php

namespace App\Models\Medicos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider_principal';

    protected $fillable = [
        'id',
        'nombre',
        'imagen',
        'descripcion',
        'status'
    ];
}
