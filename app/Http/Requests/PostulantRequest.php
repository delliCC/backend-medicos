<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostulantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gasto_mensual'=> 'required',
            // 'abono_mensual',
            // 'importe_deuda',
            'deudas'=> 'required',
            // 'modelo'=> 'required',
            // 'marca'=> 'required',
            'auto_propio'=> 'required',
            // 'casa_propia'=> 'required',
            // 'importe_renta'=> 'required',
            'paga_renta'=> 'required',
            // 'conyuge_donde'=> 'required',
            // 'importe_conyuge'=> 'required',
            //'conyuge_trabaja'=> 'required',
            // 'cual_ingreso'=> 'required',
            // 'importe_mensual'=> 'required',
            'otro_ingreso'=> 'required',

            'fecha_trabajar'=> 'required',
            'espera_oferta_laboral'=> 'required',
             // 'razones_residencia'=> 'required',
            'residencia'=> 'required',
            // 'razones_viajar'=> 'required',
            'viajar'=> 'required',
            // 'nombre_seguro'=> 'required',
            'seguro'=> 'required',
            // 'nombre_sindicato'=> 'required',
            'sindicato'=> 'required',
            // 'nombre_cia'=> 'required',
            'afianzado'=> 'required',
            // 'parientes_nombre'=> 'required',
            'parientes'=> 'required',
            // 'otros_entero'=> 'required',
            'como_entero' => 'required',

            'datos_manejo'=> 'required',
            'otros_oficios'=> 'required',
            'maquinas_software'=> 'required',   
            'idiomas'=> 'required',

            // Datos escolares
            'estudia_actualmente'=> 'required',
            'titulo'=> 'required',
            'certificado'=> 'required',
            'especialidad'=> 'required',
            'institucion'=> 'required',
            'ultimo_grado_estudios'=> 'required',

            //Datos direcciones
            'direccion'=> 'required',
            'codigo_postal'=> 'required',
            'numero_casa'=> 'required',
            'entre_calles'=> 'required',
            'colonia'=> 'required',
            'municipio'=> 'required',
            'estado'=> 'required',
            'ciudad'=> 'required',

            // Datos personales
            'vive_con'=> 'required',
            'estado_civil'=> 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required',
            // 'cartilla_militar' => 'required', opcional
            // 'tipo_licencia' => 'required', opcional
            'licencia_conducir' => 'required',
            'numero_seguro_social' => 'required|max:11',
            'rfc' => 'required|max:13',
            'curp' => 'required|max:18',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'apellido_materno' => 'required',
            'apellido_paterno' => 'required',
            'nombre' => 'required',
            'sueldo_pretendido' => 'required',
            'fecha_postulacion' => 'required',
            'sucursal_id' => 'required',
            'puesto_id' => 'required',
            'vacante_id' => 'required',
        ];
    }

    public function messages()
    {
    return [
        'vacante_id.required' =>'La vacante es requerido',
        'puesto_id.required' => 'El puesto es requerido',
        'sucursal_id.required' => 'La sucursal es requerido',
        'fecha_postulacion.required' => 'La fecha actual es requerida',
        'sueldo_pretendido.required' => 'El campo sueldo pretendido es requerido',
        'nombre.required' => 'El campo nombre es requerido',
        'apellido_paterno.required' => 'El campo apellido paterno es requerido',
        'apellido_materno.required' => 'El campo apellido materno es requerido',
        'sexo.required' => 'El campo sexo es requerido',
        'edad.required' => 'El campo edad es requerido',
        'lugar_nacimiento.required' => 'El campo lugar de nacimiento es requerido',
        'fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
        'curp.max' => 'El campo curp debe contener 18 caracteres',
        'rfc.max' => 'El campo rfc debe contener 13 caracteres',
        'numero_seguro_social.max' => 'El campo número de seguro social debe contener 11 caracteres',
        'licencia_conducir.required' => 'El campo tienes licencia de conducir es requerido',
        'telefono.max' => 'El campo teléfono debe contener 10 caracteres',
        'correo_electronico.required' => 'El campo correo electrónico es requerido',
        'estado_civil.required'=> 'El campo estado civil es requerido',
        'vive_con.required'=> 'El campo con quien vive es requerido',
        
        'ciudad.required'=> 'El campo ciudad es requerido',
        'estado.required'=> 'El campo estado es requerido',
        'municipio.required'=> 'El campo municipio es requerido',
        'colonia.required'=> 'El campo colonia es requerido',
        'entre_calles.required'=> 'El campo entre calles es requerido',
        'numero_casa.required'=> 'El campo no. de casa es requerido',
        'codigo_postal.required'=> 'El campo código Postal es requerido',
        'direccion.required'=> 'El campo dirección es requerido',
        
        'ultimo_grado_estudios.required'=> 'El campo último grado de estudio es requerido',
        'institucion.required'=> 'El campo institución es requerido',
        'especialidad.required'=> 'El campo código Postal es requerido',
        'certificado.required'=> 'El campo certificado es requerido',
        'titulo.required'=> 'El campo titulo es requerido',
        'estudia_actualmente.required'=> 'El campo estudias actualmente es requerido',
        
        'idiomas.required'=> 'El campo idiomas es requerido',
        'maquinas_software.required'=> 'El campo maquina o software de oficina que dominas es requerido',
        'otros_oficios.required'=> 'El campo otros trabajos o oficios que domines  es requerido',
        'datos_manejo.required'=> 'El campo en caso de saber conducir, indique el tipo de unidad que ha manejado es requerido',

        'como_entero.required'=> 'El campo ¿Como se entero de la oferta del empleo? es requerido',
        // 'otros_entero.required'=> 'required',
        'parientes.required'=> 'El campo ¿Tiene Parientes trabajando en esta empresa?  es requerido',
        // 'parientes_nombre.required'=> 'required',
        'afianzado.required'=> 'El campo ¿Ha estado afianzado? es requerido',
        // 'nombre_cia'=> 'required',
        'sindicato.required'=> 'El campo ¿Ha estado afiliado en algún sindicato? es requerido',
        // 'nombre_sindicato'=> 'required',
        'seguro.required'=> 'El campo ¿Tiene seguro de vida? es requerido',
        // 'nombre_seguro'=> 'required',
        'viajar.required'=> 'El campo ¿Puede Viajar? es requerido',
        // 'razones_viajar'=> 'required',
        'residencia.required'=> 'El campo ¿Está dispuesto a cambiar su lugar de residencia? es requerido',
        // 'razones_residencia'=> 'required',
        'espera_oferta_laboral.required'=> 'El campo ¿Esta en espera de alguna oferta laboral? es requerido',
        'fecha_trabajar.required'=> 'El campo Fecha en que podria presentarse a trabajar es requerido',
        
        'otro_ingreso.required'=> 'El campo ¿Tiene usted otros ingresos? es requerido',
        // 'importe_mensual.required'=> 'El campo  es requerido',
        // 'cual_ingreso.required'=> 'El campo  es requerido',
        'conyuge_trabaja.required'=> 'El campo ¿Su conyuge trabaja? es requerido',
        // 'importe_conyuge.required'=> 'El campo  es requerido',
        // 'conyuge_donde.required'=> 'El campo  es requerido',
        'paga_renta.required'=> 'El campo ¿Paga renta? es requerido',
        // 'importe_renta.required'=> 'El campo  es requerido',
        'casa_propia.required'=> 'El campo vive en casa propia es requerido',
        'auto_propio.required'=> 'El campo ¿Tiene automovil propio? es requerido',
        //'marca.required'=> 'El campo marca es requerido',
        // 'modelo.required'=> 'El campo  es requerido',
        'deudas.required'=>'El campo ¿Tiene deudas? es requerido',
        // 'importe_deuda.required'=> 'El campo  es requerido',
        // 'abono_mensual.required'=> 'El campo  es requerido',
        'gasto_mensual.required'=> 'El campo ¿Aproximadamente cual es tu gasto mensual? es requerido',
    ];
    }
}
