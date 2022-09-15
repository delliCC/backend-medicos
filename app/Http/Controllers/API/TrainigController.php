<?php

namespace App\Http\Controllers\API;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainigController extends Controller
{
    public function index()
    {
        $datos = Training::select(
            'id',
            'nombre',
            'training_url',
            'descripcion',
            'fecha_inicio',
            'preview_imagen',
            'trailer_url',
            'nombre_medico',
            'imagen_medico_url',
            'especialidad',
            'status'
        )->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Capacitación', 200);
    }
}
