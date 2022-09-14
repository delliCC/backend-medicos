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
            'fecha_inicio',
            'descripcion',
            'webinar_url',
            'ficha_nombre',
            'ficha_url',
            'ficha_descripcion',
            'preview_imagen',
            'preview_url',
            'trailer_url',
            'nombre_medico',
            'especialidad',
            'imagen_medico_url',
            'status'
        )->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de webinar', 200);
    }
}
