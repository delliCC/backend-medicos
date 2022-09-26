<?php

namespace App\Http\Controllers\Reclutamiento;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Vacant;
use App\Models\Reclutamiento\Puestos;
use App\Models\Reclutamiento\Employees;
use App\Models\Reclutamiento\Sucursales;

class VacantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "index"]];
        return view('/pages/reclutamiento/vacantes/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Sucursales::select('id','sucursal','status')->where('status',1)->get();
        $empleados = Employees::select('id','nombre','status')->where('status',1)->get();
        $puestos = Puestos::select('id','puesto','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"vacantes",'name'=>"Vacantes"], ['name'=>"Crear"]
        ];

        return view('/pages/reclutamiento/vacantes/create', ['breadcrumbs' => $breadcrumbs], compact('sucursales', 'empleados','puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'puesto_id' => 'required',
        //     'sucursal_id' => 'required',
        //     'cantidad' => 'required',
        //     'requisitos' => 'required',
        //     'funcion' => 'required',
        //     'salario' => 'required',
        //     'prestaciones' => 'required',
        //     'horario' => 'required',
        //     'reclutador_id' => 'required',
        //     // 'imagen'=>'required|image',
        // ]);

        $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
        $fileName = time();

        $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'vacantes/');

        $datos = Vacant::create($request->all());

        return $this->sendResponse();
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
        $breadcrumbs = [
            ['link'=>"vacantes", 'name'=>"Lista de vacantes"], ['name'=>"Editar"]
        ];

        $datos = Vacant::find($id);
     
        return view('/pages/reclutamiento/vacantes/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
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
            'puesto_id' => 'required',
            'sucursal_id' => 'required',
            'cantidad' => 'required',
            'requisitos' => 'required',
            'funcion' => 'required',
            'salario' => 'required',
            'prestaciones' => 'required',
            'horario' => 'required',
            'reclutador_id' => 'required',
            'imagen_url'=>'required|image',
        ]);

        $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
        $fileName = time();

        return $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'vacantes/');

        $datos = Vacant::create($request->all());
        return $this->sendResponse();
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

    function listar()
    {
        $datos = Vacant::select(
            'id',
            'puesto_id',
            'sucursal_id',
            'cantidad',
            'imagen_url',
            'requisitos',
            'status'
        )->get();
        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("vacant.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.reclutamiento.vacantes.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }
}
