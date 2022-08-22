<?php

namespace App\Models;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $guarded = [];

    public function especialidad()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id');
    }
}
