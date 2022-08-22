<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $table = 'cat_especialidades';
 
    protected $fillable = [
        'id',
        'especialidad',
        'status'
    ];
}
