<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulantLicence extends Model
{
    use HasFactory;
    protected $table = 'rh_postulant_licence';
    
    protected $fillable = [
        'id',
        'postulante_id',
        'tipo_licencia',
    ];
}
