<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Vacant;

class VacantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        )->where('sucursal_id',$id)->where('status',1)->with(['empleado'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        }])->with(['puesto'=> function ($query){
            $query->select('id', 'puesto');
        }])->with(['sucursal'=> function ($query){
            $query->select('id', 'sucursal');
        }])->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Vacantes', 200);
    }
}
