<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cupons extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'url',
        'imagen',
        'status'
    ];
}
