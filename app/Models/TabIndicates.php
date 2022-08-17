<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabIndicates extends Model
{
    use HasFactory;
    protected $table = 'tab_indicates';

    protected $fillable = [
        'nombre',
        'url',
        'descripcion',
        'status'
    ];
}
