<?php

namespace App\Models\Studies;

use App\Models\TypeSample;
use App\Models\Studies\Studies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudieSample extends Model
{
    use HasFactory;
    protected $table = 'studies_sample';
    
    protected $fillable = [
        'id',
        'estudio_id',
        'muestra_id',
        'status'
    ];

    public function muestra()
    {
        return $this->belongsTo(TypeSample::class, 'muestra_id');
    }
    
    public function estudios()
    {
        return $this->hasMany(Studies::class, 'estudio_id','id');
    }
}
