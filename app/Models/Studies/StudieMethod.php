<?php

namespace App\Models\Studies;

use App\Models\TypeMethod;
use App\Models\Studies\Studies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudieMethod extends Model
{
    use HasFactory;
    protected $table = 'studies_method';
    
    protected $fillable = [
        'id',
        'estudio_id',
        'metodo_id',
        'status'
    ];

    public function metodo()
    {
        return $this->belongsTo(TypeMethod::class, 'metodo_id');
    }

    public function estudios()
    {
        return $this->hasMany(Studies::class, 'estudio_id','id');
    }

}
