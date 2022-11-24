<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Medicos\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $datos = Slider::select(
            'id',
            'nombre',
            'imagen',
            'descripcion',
            'direccionar',
            'status'
        )->get();

        foreach ($datos as $fecha) {
            $originalDate = $fecha->created_at;
            
            $newDate = date("d-m-Y", strtotime($originalDate));

            $fecha['fecha'] = $newDate;
        }
        
        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista slider', 200);
    }
}
