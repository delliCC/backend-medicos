<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Medico;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\HistoryWebinar;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Lista de Médicos"], ['name'=>"Index"]
        ];

        return view('/pages/medicos/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidad = Specialty::select('id','especialidad','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"medicos",'name'=>"Médicos"], ['name'=>"Crear"]
        ];

        return view('/pages/medicos/create', ['breadcrumbs' => $breadcrumbs], compact('especialidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email|unique:medicos,correo',
            'telefono' => 'required|min:10|numeric',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'prefijo' => 'required',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('success', 'Datos guardados correctamente.');
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
        $especialidad = Specialty::select('id','especialidad','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Lista de Médicos"], ['name'=>"Editar"]
        ];

        $medico = Medico::with(['especialidad'=> function ($query){
            $query->select('id', 'especialidad');
        }])->find($id);
     
        return view('/pages/medicos/edit', ['breadcrumbs' => $breadcrumbs, 'medico' => $medico], compact('especialidad'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email|email',
            'telefono' => 'required|min:10|numeric',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'prefijo' => 'required',
        ]);

        $medico = Medico::find($id);

        
        if($request->tipo_medico === 'General'){
            $especialidad = null;
        }else{
            $especialidad =  $request->especialidad_id;
        }

        $medico->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'municipio' => $request->municipio,
            'prefijo' => $request->prefijo,
            'tipo_medico' => $request->tipo_medico,
            'especialidad_id' => $especialidad,
        ]);

        return redirect()->route('medicos.index')->with('success', 'Datos actualizados correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // HistoryWebinar::
    }

    /**
     * Lista medicos con Datatables.
     *
     * @return \Illuminate\Http\Response
     */
    function listar()
    {
        $medicos = Medico::select(
            'id',
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'correo',
            'telefono',
            'tipo_medico',
            'especialidad_id',
        )->with(['especialidad'=> function ($query){
            $query->select('id', 'especialidad');
        }])->get();
       
        return DataTables::of($medicos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("medicos.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            $btn .= '<a href="'.route("medicos.historyWebinar", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="archive"></i></a>';
            return $btn;
        })->addColumn('especialidad_id', function($row) {
            if($row->especialidad_id != null){
                return  $row->especialidad->especialidad;
            }
            return '';
        })->addColumn('status', function($row) {
            return view('components.medicos.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    //Webinar
    public function historyWebinar($id)
    {
        $especialidad = Specialty::select('id','especialidad','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Lista de Médicos"], ['name'=>"Editar"]
        ];

        $medico = Medico::find($id);
        return view('/pages/medicos/history', ['breadcrumbs' => $breadcrumbs, 'medico' => $medico], compact('especialidad'));
    }

    function listarWebinar()
    {
        $history = HistoryWebinar::select(
            'id',
            'medico_id',
            'webinar_id',
            'fecha_inicio',
            'fecha_fin',
            'status'
        )->with(['historyWebinar'=> function ($query){
            $query->select('id', 'webinar');
        }])->get();
        return DataTables::of($history)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a onclick="constancia('.$row->id.', `'.$row->webinar_id.'`)" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="book-open"></i></a>';
            return $btn;
        })->addColumn('historyWebinar', function($row) {
            return  $row->historyWebinar->webinar;
        })->addColumn('status', function($row) {
            return view('components.medicos.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Medico::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
