<?php

namespace App\Http\Controllers\Reclutamiento;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Sucursales;

class SucursalesController extends Controller
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
        return view('/pages/reclutamiento/sucursales/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"sucursales",'name'=>"Sucursales"], ['name'=>"Crear"]
        ];

        return view('/pages/reclutamiento/sucursales/create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sucursal' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|min:10|numeric',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        Sucursales::create($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Datos guardados correctamente.');
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
            ['link'=>"empleados", 'name'=>"Lista de Empleados"], ['name'=>"Editar"]
        ];

        $datos = Sucursales::find($id);
     
        return view('/pages/reclutamiento/sucursales/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
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
            'sucursal' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|min:10|numeric',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        $medico = Sucursales::find($id);

        $medico->update($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Datos actualizados correctamente.');
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
        $medicos = Sucursales::select(
            'id',
            'sucursal',
            'correo',
            'telefono',
            'direccion',
            'pais',
            'estado',
            'municipio',
            'status',
        )->get();
       
        return DataTables::of($medicos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("sucursales.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.reclutamiento.sucursales.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Sucursales::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
