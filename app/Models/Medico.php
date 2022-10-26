<?php

namespace App\Models;

use App\Models\Specialty;
use App\Models\HistoryWebinar;
use App\Models\HistoryTraining;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'telefono',
        'tipo_medico',
        'especialidad_id',
        'status'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Specialty::class, 'especialidad_id');
    }

    public function historyWebinar()
    {
        return $this->hasMany(HistoryWebinar::class, 'medico_id','id');
    }

    public function historyTraining()
    {
        return $this->hasMany(HistoryTraining::class, 'medico_id','id');
    }
}
