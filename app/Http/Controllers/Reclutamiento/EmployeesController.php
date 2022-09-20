<?php

namespace App\Http\Controllers\Reclutamiento;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Employees;

class EmployeesController extends Controller
{
    public function index()
    {
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "index"]];
        return view('/pages/reclutamiento/employees/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"empleados",'name'=>"Empleados"], ['name'=>"Crear"]
        ];

        return view('/pages/reclutamiento/employees/create', ['breadcrumbs' => $breadcrumbs]);
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
        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Lista de Médicos"], ['name'=>"Editar"]
        ];

        $datos = Employees::find($id);
     
        return view('/pages/reclutamiento/employees//edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
   
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

    function listar()
    {
        $medicos = Employees::select(
            'id',
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'correo',
            'telefono',
        )->get();
       
        return DataTables::of($medicos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("employees.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.medicos.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Employees::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
