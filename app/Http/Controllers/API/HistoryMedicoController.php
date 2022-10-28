<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\HistoryWebinar;
use App\Models\HistoryTraining;
use App\Http\Controllers\Controller;

class HistoryMedicoController extends Controller
{
    public function training($id)
    {
        $datos = HistoryTraining::select(
            'id',
            'medico_id',
            'training_id',
            'fecha_inicio',
            'fecha_fin',
            'status'
        )->with(['training'=> function ($query){
            $query->select('id','nombre','nombre_medico');
        }])->where('medico_id',$id)->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de webinar', 200);
    }

    public function webinar($id)
    {
        $datos = HistoryWebinar::select(
            'id',
            'medico_id',
            'webinar_id',
            'fecha_inicio',
            'fecha_fin',
            'status'
        )->with(['webinar'=> function ($query){
            $query->select('id','nombre','nombre_medico');
        }])->where('medico_id',$id)->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de capacitaciones', 200);
    }

}
