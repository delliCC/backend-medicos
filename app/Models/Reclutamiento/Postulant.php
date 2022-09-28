<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Vacant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postulant extends Model
{
    use HasFactory;
    protected $table = 'rh_postulante';
    
    protected $fillable = [
        'id',
        'vacante_id',
        'puesto_id',
        'sucursal_id',
        'fechaPostulacion',
        'sueldoPretendido',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'status',
        'sexo',
        'edad',
        'lugar_nacimiento',
        'fecha_nacimiento',
        'curp',
        'rfc',
        'numero_social',
        'licencia_conducir',
        'cartilla',
        'correo',
        'telefono',
        'vive_con',

        'ciudad',
        'estado',
        'municipio',
        'colonia',
        'entre_calles',
        'numero_casa',
        'codigo_postal',
        'direccion',

        'ultimo_grado_estudios',
        'institucion',
        'especialidad',
        'certificado',
        'titulo',
        'cedula',
        'trunco',
        'estudia_actualmente',
        'institucion_actual',
        'carrera_actual',
        'semestre_actual',
        'horario_actual',

        'idiomas',
        'maquinas_software',
        'otros_oficios',
        'datos_manejo',

        'estado_postulante',
        'status'
    ];

    public function vacantes()
    {
        return $this->belongsTo(Vacant::class, 'vacante_id');
    }
}