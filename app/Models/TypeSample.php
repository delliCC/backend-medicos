<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSample extends Model
{
    use HasFactory;

    protected $table = 'type_sample';
 
    protected $fillable = [
        'muestra',
        'status'
    ];
}
