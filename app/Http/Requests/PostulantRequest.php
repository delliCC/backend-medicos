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
            

            // 'ciudad'=> 'required',
            // 'estado'=> 'required',
            // 'municipio'=> 'required',
            // 'colonia'=> 'required',
            // 'entre_calles'=> 'required',
            // 'numero_casa'=> 'required',
            // 'codigo_postal'=> 'required',
            // 'direccion'=> 'required',

            // 'ultimo_grado_estudios'=> 'required',
            // 'institucion'=> 'required',
            // 'especialidad'=> 'required',
            // 'certificado'=> 'required',
            // 'titulo'=> 'required',
            // 'estudia_actualmente'=> 'required',

            // 'idiomas'=> 'required',
            // 'maquinas_software'=> 'required',
            // 'otros_oficios'=> 'required',
            // 'datos_manejo'=> 'required',
            'gasto_mensual'=> 'required',


            // Datos personales
            'vive_con'=> 'required',
            'estado_civil'=> 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required',
            // 'cartilla_militar' => 'required', opcional
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
        'apellido_paterno.required' => 'El campo Apellido paterno es requerido',
        'apellido_materno.required' => 'El campo Apellido Materno es requerido',
        'sexo.required' => 'El campo sexo es requerido',

        'numero_seguro_social.max' => 'Te has pasado de caracteres, solo se aceptan 11',
        'gasto_mensual' => 'El campo Gastos mensuales es requerido',
        // 'nivel.min' => 'El nivel como mínimo debe tener 0',
        // 'nivel.max' => 'El nivel como máximo debe tener 10',
        // 'nivel.integer' => 'El nivel debe ser una cifra entre 0 y 10'
    ];
    }
}
