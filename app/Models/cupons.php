<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    protected $fillable = [
        'id',
        'nombre',
        'url',
        'status'
    ];
}
