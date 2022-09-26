<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Vacant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sucursales extends Model
{
    use HasFactory;

    protected $table = 'rh_sucursales';
    
    protected $fillable = [
        'id',
        'sucursal',
        'correo',
        'telefono',
        'direccion',
        'pais',
        'estado',
        'municipio',
        'status',
    ];

    public function vacantes()
    {
        return $this->hasMany(Vacant::class, 'sucursal_id','id');
    }

}
