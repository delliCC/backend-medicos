<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialtyController extends Controller
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
            ['link' => "javascript:void(0)", 'name' => "Catálogos"], ['link' => "javascript:void(0)", 'name' => "Especialidades"]
        ];
        return view('/pages/specialty/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
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
        $this->validate($request, [
            'especialidad' => 'required|string|unique:cat_especialidades,especialidad',
        ]);

        specialty::create($request->all());
        return redirect()->route('specialty.index')->with('success', 'Datos guardados correctamente.');
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
            ['link'=>"especialidad", 'name'=>"Lista de Especialidad"], ['name'=>"Editar"]
        ];

        $especialidad = specialty::find($id);

        return view('/pages/specialty/edit', ['breadcrumbs' => $breadcrumbs, 'especialidad' => $especialidad]);
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
            'especialidad' => 'required|string|unique:cat_especialidades,especialidad',
        ]);

        $especialidad = specialty::find($id);

        $especialidad->update($request->all());

        return redirect()->route('specialty.index')->with('success', 'Datos actualizados correctamente.');
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

    public function status($id, $estado)
    {
        $datos = specialty::findOrFail($id);
        if ($datos->status === 1) {
            $datos->status = $estado;
            $datos->save();
            return 'cambio: activo a '.$estado;
        }else{
            
            $datos->status = $estado;
            $datos->save();
            return 'cambio: inactivo a '. $estado;
        }
        return $datos;
    }

    function listar()
    {
        $especialidad = specialty::select(
            'id',
            'especialidad',
            'status',
        )->get();
        return DataTables::of($especialidad)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("specialty.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->rawColumns(['accion'])->make();
    }
}
