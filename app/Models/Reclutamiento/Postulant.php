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
        'fechaPostulacion',
        'sueldoPretendido',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'status',
        'sexo',
        'edad',
        'lugarNacimiento',
        'fechaNacimiento',
        'curp',
        'rfc',
        'numero_social',
        'licencia_conducir',
        'cartilla',
        'correo',
        'phone',

        'calle',
        'numeroCasa',
        'entreCalles',
        'colonia',
        'ciudad',
        'estado',
        'municipio',
        'codigoPostal',

        'nombrePadre',
        'ocupacionPadre',
        'edadPadre',
        'phonePadre',
        'domicilioPadre',

        'nombreMadre',
        'ocupacionMadre',
        'edadMadre',
        'phoneMadre',
        'domicilioMadre',

        'nombreEsposo',
        'ocupacionEsposo',
        'edadEsposo',
        'phoneEsposo',
        'domicilioEsposo',

        'ultimoGradoEstudios',
        'institucion',
        'especialidad',
        'certificado',
        'titulo',
        'cedula',
        'trunco',
        'estudias',
        'institucionActual',
        'carrera',
        'semestre',
        'horario',

        'idiomas',
        'maquinaSoftware',
        'oficiosDomines',
        'domicilioConocimientos',

        'nombreReferencia',
        'ocupacionReferencia',
        'edadReferencia',
        'phoneReferencia',
        'domicilioReferencia',

        'nombreReferencia2',
        'ocupacionReferencia2',
        'edadReferencia2',
        'phoneReferencia2',
        'domicilioReferencia2',

        'nombreReferencia3',
        'ocupacionReferencia3',
        'edadReferencia3',
        'phoneReferencia3',
        'domicilioReferencia3',

        'empresaTrayectoLaboral',
        'ocupacionReferencia',
        'domicilioTrayectoLaboral',
        'phoneTrayectoLaboral',
        'giroComercial',
        'fechaIngresoTrayectoLaboral',
        'fechaBajaTrayectoLaboral',
        'domicilioTrayectoLaboral',
        'puestoInicial',
        'sueldoInicial',
        'ultimoPuesto',
        'ultimoSueldo',
        'nombreJefe',
        'puestoJefe',
        'motivoSalida',
        'cual',

        'empresaTrayectoLaboral2',
        'ocupacionReferencia2',
        'domicilioTrayectoLaboral2',
        'phoneTrayectoLaboral2',
        'giroComercial2',
        'fechaIngresoTrayectoLaboral2',
        'fechaBajaTrayectoLaboral2',
        'domicilioTrayectoLaboral2',
        'puestoInicial2',
        'sueldoInicial2',
        'ultimoPuesto2',
        'ultimoSueldo2',
        'nombreJefe2',
        'puestoJefe2',
        'motivoSalida2',
        'cual2',

        'empresaTrayectoLaboral3',
        'ocupacionReferencia3',
        'domicilioTrayectoLaboral3',
        'phoneTrayectoLaboral3',
        'giroComercial3',
        'fechaIngresoTrayectoLaboral3',
        'fechaBajaTrayectoLaboral3',
        'domicilioTrayectoLaboral3',
        'puestoInicial3',
        'sueldoInicial3',
        'ultimoPuesto3',
        'ultimoSueldo3',
        'nombreJefe3',
        'puestoJefe3',
        'motivoSalida3',
        'cual3',

        'estado_postulante',
        'status'
    ];

    public function vacantes()
    {
        return $this->belongsTo(Vacant::class, 'vacante_id');
    }
}