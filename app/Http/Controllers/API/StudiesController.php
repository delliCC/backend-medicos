<?php

namespace App\Http\Controllers\API;

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

        return $datos;
    }
}
