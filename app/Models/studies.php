<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studies extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudios',
        'descripcion',
        'status'
    ];
}