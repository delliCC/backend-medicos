<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Vacant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VacantAmountSucursal extends Model
{
    use HasFactory;

    protected $table = 'rh_vacante_cantidad_sucursal';
    
    protected $fillable = [
        'id',
        'vacante_id',
        'sucursal_id',
        'cantidad',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursales::class, 'sucursal_id');
    }

    public function vacante()
    {
        return $this->belongsTo(Vacant::class, 'vacante_id');
    }

}
