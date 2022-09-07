<?php

namespace App\Models\Studies;

use App\Models\Studies\StudieMethod;
use App\Models\Studies\StudieSample;
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
        'informacion_clinica',
        'precauciones',
        'status'
    ];

    public function metodos()
    {
        return $this->hasMany(StudieMethod::class, 'estudio_id');
        // belongsToMany
    }

    public function muestras()
    {
        return $this->hasMany(StudieSample::class,'estudio_id');
    }
}
