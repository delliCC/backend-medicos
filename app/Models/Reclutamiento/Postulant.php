<?php

namespace App\Models\Reclutamiento;

use App\Models\Reclutamiento\Vacant;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reclutamiento\PostulantFamily;
use App\Models\Reclutamiento\PostulantReference;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postulant extends Model
{
    use HasFactory;
    protected $table = 'rh_postulante';
    
    protected $fillable = [
        'id',
        'vacante_id',
        'fecha_postulacion',
        'sueldo_pretendido',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
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
        'estado_civil',
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
        'maquina_software',
        'oficios_domines',
        'datos_manejo',

        'como_entero',
        'otros_entero',
        'parientes',
        'parientes_nombre',
        'afianzado',
        'nombre_cia',
        'sindicato',
        'nombre_sindicato',
        'seguro',
        'nombre_seguro',
        'viajar',
        'razones_viajar',
        'residencia',
        'razones_residencia',
        'espera_oferta_laboral',
        'fecha_trabajar',
        
        'otro_ingreso',
        'importe_mensual',
        'motivo_conyuge',
        'conyuge_trabaja',
        'importe_conyuge',
        'conyuge_donde',
        'paga_renta',
        'importe_renta',
        'casa_propia',
        'auto_propio',
        'marca',
        'modelo',
        'deudas',
        'importe_deuda',
        'abono_mensual',

        'estado_postulante',
        'status'
    ];

    public function vacantes()
    {
        return $this->belongsTo(Vacant::class, 'vacante_id');
    }

    public function familiares()
    {
        return $this->hasMany(PostulantFamily::class, 'postulante_id','id');
    }

    public function referencias()
    {
        return $this->hasMany(PostulantReference::class, 'postulante_id','id');
    }
}