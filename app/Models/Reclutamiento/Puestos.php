<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    use HasFactory;

    protected $table = 'rh_puestos';
    
    protected $fillable = [
        'id',
        'puesto',
        'funcion',
        'status',
    ];
}
