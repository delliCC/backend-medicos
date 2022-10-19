<?php

namespace App\Http\Controllers\API;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $datos = Blog::select(
            'id',
            'titulo',
            'imagen_portada',
            'descripcion_portada',
            'imagen_destacada',
            'descripcion',
            'created_at',
            'status'
        )->get();

        foreach ($datos as $fecha) {
            $originalDate = $fecha->created_at;
            $newDate = date("d-m-Y", strtotime($originalDate));

            $fecha['fecha'] = $newDate;
        }
        

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de blog', 200);
    }

    public function show($id)
    {
        $datos = Blog::select(
            'id',
            'titulo',
            'imagen_portada',
            'descripcion_portada',
            'imagen_destacada',
            'descripcion',
            'created_at',
            'status'
        )->where('status',1)->find($id);

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Datos del blog', 200);
    }
}
