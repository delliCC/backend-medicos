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
        'status',
    ];
}
