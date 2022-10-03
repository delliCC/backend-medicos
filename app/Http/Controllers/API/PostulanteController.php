<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Vacant;
use App\Models\Reclutamiento\Postulant;

class PostulanteController extends Controller
{
    public function index($id)
    {
        $datos = Vacant::select(
            'id',
            'imagen_url',
            'puesto_id',
            'sucursal_id',
            'cantidad',
            'requisitos',
            'funcion',
            'salario',
            'prestaciones',
            'horario',
            'reclutador_id',
            'status',
        )->where('status',1)->with(['empleado'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        }])->with(['puesto'=> function ($query){
            $query->select('id', 'puesto');
        }])->with(['sucursal'=> function ($query){
            $query->select('id', 'sucursal');
        }])->find($id);

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Vacantes', 200);
    }

    public function guardar(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'vacante_id' => 'required',
            'puesto_id' => 'required',
            'sucursal_id' => 'required',
            'fecha_postulacion' => 'required',
            'sueldo_pretendido' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'edad' => 'required',
            'lugar_nacimiento' => 'required',
            'fecha_nacimiento' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'numero_seguro_social' => 'required',
            'licencia_conducir' => 'required',
            // 'cartilla_militar' => 'required', opcional
            'correo_electronico' => 'required',
            'telefono' => 'required',
            'estado_civil'=> 'required',
            'vive_con'=> 'required',

            'ciudad'=> 'required',
            'estado'=> 'required',
            'municipio'=> 'required',
            'colonia'=> 'required',
            'entre_calles'=> 'required',
            'numero_casa'=> 'required',
            'codigo_postal'=> 'required',
            'direccion'=> 'required',

            'ultimo_grado_estudios'=> 'required',
            'institucion'=> 'required',
            'especialidad'=> 'required',
            'certificado'=> 'required',
            'titulo'=> 'required',
            // 'cedula'=> 'required',
            // 'trunco'=> 'required',
            'estudia_actualmente'=> 'required',
            // 'institucion_actual'=> 'required',
            // 'carrera_actual'=> 'required',
            // 'semestre_actual'=> 'required',
            // 'horario_actual'=> 'required',

            'idiomas'=> 'required',
            'maquinas_software'=> 'required',
            'otros_oficios'=> 'required',
            'datos_manejo'=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',
            // ''=> 'required',

        ]);

        return $datos = Postulant::create([
            'vacante_id'=> $request->vacante_id,
            'fecha_postulacion'=> $request->fecha_postulacion,
            'sueldo_pretendido'=> $request->sueldo_pretendido,
            'nombre'=> $request->nombre,
            'apellido_paterno'=> $request->apellido_paterno,
            'apellido_materno'=> $request->apellido_materno, 
            'sexo'=> $request->sexo,
            'edad'=> $request->edad,
            'lugar_nacimiento'=> $request->lugar_nacimiento,
            'fecha_nacimiento'=> $request->fecha_nacimiento,
            'curp'=> $request->curp,
            'rfc'=> $request->rfc,
            'numero_social'=> $request->numero_seguro_social,
            'licencia_conducir'=> $request->licencia_conducir,
            'cartilla'=> $request->cartilla_militar,
            'correo'=> $request->correo_electronico,
            'telefono'=> $request->telefono,
            'estado_civil'=> $request->estado_civil,
            'vive_con'=> $request->vive_con,
            
            'direccion'=> $request->direccion,
            'numero_casa'=> $request->numero_casa,
            'entre_calles'=> $request->entre_calles,
            'colonia'=> $request->colonia,
            'ciudad'=> $request->ciudad,
            'estado'=> $request->estado,
            'municipio'=> $request->municipio,
            'codigo_postal'=> $request->codigo_postal,

            'ultimo_grado_estudios'=> $request->ultimo_grado_estudios,
            'institucion'=> $request->institucion,
            'especialidad'=> $request->especialidad,
            'certificado'=> $request->certificado,
            'titulo'=> $request->titulo,
            'cedula'=> $request->cedula,
            'trunco'=> $request->trunco,
            'estudia_actualmente'=> $request->estudia_actualmente,
            'institucion_actual'=> $request->institucion_actual,
            'carrera_actual'=> $request->carrera_actual,
            'semestre_actual'=> $request->semestre_actual,
            'horario_actual'=> $request->horario_actual,

            'idiomas'=> $request->idiomas,
            'maquina_software'=> $request->maquinas_software,
            'oficios_domines'=> $request->otros_oficios,
            'datos_manejo'=> $request->datos_manejo,
            // ''=> $request->,
            // ''=> $request->,
            // ''=> $request->,
            // ''=> $request->,


        ]);
        $array = json_decode($datos, true);
       // return $this->sendResponse($array, 'Lista de Vacantes', 200);
        return redirect()->route('postulant.solicitud')->with('success', 'Datos guardados correctamente.');
    }
}
