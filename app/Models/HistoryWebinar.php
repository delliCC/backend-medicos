<?php

namespace App\Models;

use App\Models\Medico;
use App\Models\Webinar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryWebinar extends Model
{
    use HasFactory;

    protected $table = 'medico_webinar';
 
    protected $fillable = [
        'id',
        'medico_id',
        'webinar_id',
        'fecha_inicio',
        'fecha_fin',
        'status'
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
