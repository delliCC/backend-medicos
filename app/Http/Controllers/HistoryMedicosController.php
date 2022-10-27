<?php

namespace App\Http\Controllers;

use PDF;
use DataTables;
use App\Models\Medico;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\HistoryWebinar;
use App\Models\HistoryTraining;


class HistoryMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $especialidad = Specialty::select('id','especialidad','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Historial del webinar"], ['name'=>"history"]
        ];

        $medico = Medico::with(['historyWebinar'=> function ($query) use ($id){
            $query->select('id','medico_id', 'webinar_id','fecha_inicio','fecha_fin')->where('medico_id', $id);
        }])->with(['historyTraining'=> function ($query) use ($id){
            $query->select('id','medico_id', 'training_id','fecha_inicio','fecha_fin')->where('medico_id', $id);
        }])->find($id);
        return view('/pages/medicos/history', ['breadcrumbs' => $breadcrumbs, 'medico' => $medico], compact('especialidad'));
    }

    function listar($id)
    {
        $history = HistoryWebinar::select(
            'id',
            'medico_id',
            'webinar_id',
            'fecha_inicio',
            'fecha_fin',
            'status'
        )->with(['webinar'=> function ($query){
            $query->select('id','nombre','nombre_medico');
        }])->where('medico_id',$id)->get();


        return DataTables::of($history)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("history.constancia", $row->webinar_id).'" class="btn btn btn-gradient-info btn-sm" target="_blank"><i data-feather="file"></i></a>';
            return $btn;
        })->addColumn('nombre', function($row) {
           return $row->webinar->nombre;
        })->addColumn('medico', function($row) {
            return $row->webinar->nombre_medico;
        })->rawColumns(['accion'])->make();
    }


    public function constancia($id)
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
        }])->where('webinar_id',$id)->first();

        // return $id;
        $pdf = PDF::loadView('components.medicos.history.constancia', compact('datos'));
        return $pdf->stream('vvv');
            // return $pdf->download('solicitud_empleo.pdf');
    }

    public function listarTraining($id)
    {
        $history = HistoryTraining::select(
            'id',
            'medico_id',
            'training_id',
            'fecha_inicio',
            'fecha_fin',
            'status'
        )->with(['training'=> function ($query){
            $query->select('id','nombre','nombre_medico');
        }])->where('medico_id',$id)->get();


        return DataTables::of($history)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("history.constancia.training", $row->training_id).'" class="btn btn btn-gradient-info btn-sm" target="_blank"><i data-feather="file"></i></a>';
            return $btn;
        })->addColumn('nombre', function($row) {
            return $row->training->nombre;
        })->addColumn('medico', function($row) {
            return $row->training->nombre_medico;
        })->rawColumns(['accion'])->make();
    }

    public function constanciaTraining($id)
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
        }])->where('medico_id',$id)->first();

        // return $id;
        $pdf = PDF::loadView('components.medicos.history.training.constancia', compact('datos'));
        return $pdf->stream('vvv');
            // return $pdf->download('solicitud_empleo.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
