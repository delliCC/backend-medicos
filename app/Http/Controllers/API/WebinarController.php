<?php

namespace App\Http\Controllers\API;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebinarController extends Controller
{
    public function index()
    {
        $datos = Webinar::select(
            'id',
            'nombre',
            'webinar_url',
            'descripcion',
            'ficha_nombre',
            'ficha_url',
            'ficha_descripcion',
            'fecha_inicio',
            'preview_imagen',
            'trailer_url',
            'nombre_medico',
            'imagen_medico_url',
            'especialidad',
            'status'
        )->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de webinar', 200);
    }
}
