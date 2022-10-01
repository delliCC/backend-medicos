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
            'numero_social' => 'required',
            'licencia_conducir' => 'required',
            'cartilla' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'estado_civil'=> 'required',
            'vive_con'=> 'required',
            // ''=> 'required'
        ]);

        $datos = Postulant::create([
            'vacante_id'=> $request->vacante_id,
            'puesto_id'=> $request->puesto_id,
            'sucursal_id'=> $request->sucursal_id,
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
            'numero_social'=> $request->numero_social,
            'licencia_conducir'=> $request->licencia_conducir,
            'cartilla'=> $request->cartilla,
            'correo'=> $request->correo,
            'telefono'=> $request->telefono,
            'estado_civil'=> $request->estado_civil,
            'vive_con'=> $request->vive_con,
            // ''=> $request->,
            // ''=> $request->,
            // ''=> $request->,
        ]);
        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Vacantes', 200);
        return redirect()->route('postulant.solicitud')->with('success', 'Datos guardados correctamente.');
    }
}
