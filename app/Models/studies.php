<?php

namespace App\Models;

use App\Models\TypeMethod;
use App\Models\TypeSample;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Studies extends Model
{
    use HasFactory;
    protected $table = 'studies';
    
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'metodo_id',
        'muestra_id',
        'informacion_clinica',
        'status'
    ];

    public function metodo()
    {
        return $this->belongsTo(TypeMethod::class, 'metodo_id');
    }

    public function muestra()
    {
        return $this->belongsTo(TypeSample::class, 'muestra_id');
    }
}