<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Studies\Studies;
use App\Http\Controllers\Controller;

class StudiesController extends Controller
{
    public function index()
    {
        $datos = Studies::select(
            'id',
            'titulo',
            'imagen_portada',
            'descripcion',
            'informacion_clinica',
            'precauciones',
            'status'
        )->with(['metodos'=> function ($query){
            $query->select('id','estudio_id','metodo_id','status')->where('status',1)->with(['metodo'=> function ($query){
                $query->select('id', 'metodo');
            }]);
        }])->with(['muestras'=> function ($query){
            $query->select('id',
            'estudio_id',
            'muestra_id',
            'status')->where('status',1)->with(['muestra'=> function ($query){
                $query->select('id', 'muestra');
            }]);
        }])->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de estudios', 200);
    }

    public function show($id)
    {
        $datos = Studies::select(
            'id',
            'titulo',
            'descripcion',
            'informacion_clinica',
            'precauciones',
            'imagen_destacada',
            'imagen_portada',
            'status'
        )->with(['metodos'=> function ($query){
            $query->select('id','estudio_id','metodo_id','status')->where('status',1)->with(['metodo'=> function ($query){
                $query->select('id', 'metodo');
            }]);
        }])->with(['muestras'=> function ($query){
            $query->select('id',
            'estudio_id',
            'muestra_id',
            'status')->where('status',1)->with(['muestra'=> function ($query){
                $query->select('id', 'muestra');
            }]);
        }])->where('status',1)->find($id);

        $originalDate = $datos->created_at;
        $newDate =  Carbon::parse($originalDate)->format('l jS \of F Y h:i:s A');
        // $originalDate->format('l jS \of F Y h:i:s A');
        // $newDate = date("d-m-Y", strtotime($originalDate));

        $datos['fecha'] = $newDate;

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Datos del estudio', 200);
    }
}
