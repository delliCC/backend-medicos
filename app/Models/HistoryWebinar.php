<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
