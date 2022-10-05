<?php

namespace App\Models\Reclutamiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulantDocument extends Model
{
    use HasFactory;

    protected $table = 'rh_postulant_document';
    
    protected $fillable = [
        'id',
        'postulante_id',
        'imagen_url',
    ];
}
