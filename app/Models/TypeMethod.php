<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMethod extends Model
{
    use HasFactory;

    protected $table = 'type_method';
 
    protected $fillable = [
        'metodo',
        'status'
    ];
}
