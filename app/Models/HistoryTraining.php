<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryTraining extends Model
{
    use HasFactory;
    protected $table = 'medico_training';
 
    protected $fillable = [
        'id',
        'medico_id',
        'training_id',
        'fecha_inicio',
        'fecha_fin',
        'status'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
