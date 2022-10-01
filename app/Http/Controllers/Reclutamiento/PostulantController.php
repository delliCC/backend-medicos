<?php

namespace App\Http\Controllers\Reclutamiento;

use PDF;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Puestos;
use App\Models\Reclutamiento\Employees;
use App\Models\Reclutamiento\Postulant;
use App\Models\Reclutamiento\Sucursales;

class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Employees::select('id','nombre', 'apellido_paterno', 'apellido_materno','status')->where('status',1)->get();
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "index"]];
        return view('/pages/reclutamiento/postulant/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs], compact('empleados'));

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
        $sucursales = Sucursales::select('id','sucursal','status')->where('status',1)->get();
        // $empleados = Employees::select('id','nombre','status')->where('status',1)->get();
        $puestos = Puestos::select('id','puesto','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Datos del postulante"], ['name'=>"Editar"]
        ];

        $datos = Postulant::with(['vacantes'=> function ($query){
            $query->select('id', 'puesto_id','sucursal_id', 'reclutador_id')->with(['puesto'=> function ($query){
                $query->select('id', 'puesto');
            }])->with(['sucursal'=> function ($query){
                $query->select('id', 'sucursal');
            }])->with(['empleado'=> function ($query){
                $query->select('id', 'nombre','apellido_paterno','apellido_materno');
            }]);
        }])->with(['familiares'=> function ($query){
            $query->select('id','postulante_id' ,'nombre','ocupacion', 'edad', 'telefono', 'domicilio');
        }])->with(['referencias'=> function ($query){
            $query->select('id','postulante_id', 'nombre', 'ocupacion', 'edad', 'telefono', 'domicilio');
        }])->find($id);
        
        return view('/pages/reclutamiento/postulant/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos], compact('sucursales','puestos'));

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
        $datos = Postulant::find($id);
        $datos->delete();
        return $this->sendResponse($datos);
    }

    public function solicitud($id)
    {       
        $datos = Postulant::with(['vacantes'=> function ($query){
            $query->select('id', 'puesto_id','sucursal_id', 'reclutador_id')->with(['puesto'=> function ($query){
                $query->select('id', 'puesto');
            }])->with(['sucursal'=> function ($query){
                $query->select('id', 'sucursal');
            }])->with(['empleado'=> function ($query){
                $query->select('id', 'nombre','apellido_paterno','apellido_materno');
            }]);
        }])->find($id);
        $pdf = PDF::loadView('components.reclutamiento.postulant.solicitud', compact('datos'));
        return $pdf->stream($datos->nombre);
            // return $pdf->download('solicitud_empleo.pdf');
    }

    function listar()
    {
        $datos = Postulant::select(
            'id',
            'vacante_id',
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'fecha_postulacion',
            'estado_postulante',
            'status'
        )->with(['vacantes'=> function ($query){
            $query->select('id', 'puesto_id','sucursal_id', 'reclutador_id')->with(['puesto'=> function ($query){
                $query->select('id', 'puesto');
            }])->with(['sucursal'=> function ($query){
                $query->select('id', 'sucursal');
            }])->with(['empleado'=> function ($query){
                $query->select('id', 'nombre','apellido_paterno','apellido_materno');
            }]);
        }])->get();

        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            // $pdf = \PDF::loadView('components.reclutamiento.postulant.solicitud');
            // return $pdf->download('solicitud_empleo.pdf');
            $btn .= '<a href="'.route("postulant.solicitud", $row->id).'" class="btn btn-outline-info btn-sm" target="_blank"><i data-feather="file"></i></a>';
            $btn .= '<a href="'.route("postulant.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            if($row->estado_postulante != "seleccionado"){
                $btn .= '<a href="'.route("postulant.destroy", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="trash"></i></a>';
            }
            return $btn;
        })->addColumn('vacante_id', function($row) {
            return $row->vacantes->puesto->puesto;
        })->addColumn('sucursal_id', function($row) {
            return $row->vacantes->sucursal->sucursal;
        })->addColumn('nombre', function($row) {
            return $row->nombre .' '. $row->apellido_paterno .' '. $row->apellido_materno;
        })->addColumn('estado_postulante', function($row) {
            return view('components.reclutamiento.postulant.select', ['data' => $row]);
        })->addColumn('reclutador_id', function($row) {
            return $row->vacantes->empleado->nombre .' '. $row->vacantes->empleado->apellido_paterno .' '. $row->vacantes->empleado->apellido_materno;
        })->rawColumns(['accion'])->make();
    }

    public function changeEstado($id, $estado)
    {
        $datos = Postulant::findOrFail($id);

        $datos->update([
            'estado_postulante'=>$estado
        ]);
        return $this->sendResponse($datos);
    }
}
