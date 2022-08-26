<?php

namespace App\Models;

use App\Models\Specialty;
use App\Models\HistoryWebinar;
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

    public function historyWebinar()
    {
        return $this->hasMany(HistoryWebinar::class, 'id','webinar_id');
    }
}
