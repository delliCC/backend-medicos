<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    use HasFactory;
    protected $table = 'studies';
    
    protected $fillable = [
        'titulo',
        'descripcion',
        'metodo_id',
        'muestra_id',
        'informacion_clinica',
        'status'
    ];
}