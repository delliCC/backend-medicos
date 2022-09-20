<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'rh_wallet';
    
    protected $fillable = [
        'id',
        'vacante_id',
        'requisitos',
        'funcion',
        'salario',
        'prestaciones',
        'horario',
        'lugar_trabajo',
        'reclutador_id',
        'status',
    ];
}
