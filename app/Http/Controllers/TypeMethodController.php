<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\TypeMethod;
use Illuminate\Http\Request;

class TypeMethodController extends Controller
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
            ['link' => "javascript:void(0)", 'name' => "Catálogos"], ['link' => "javascript:void(0)", 'name' => "Método"]
        ];
        return view('/pages/type_method/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
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
            'metodo'=> 'required|string|unique:type_method,metodo',
        ]);

        TypeMethod::create($request->all());
        return redirect()->route('method.index')->with('success', 'Datos guardados correctamente.');
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
        $this->validate($request, [
            'metodo'=> 'required|string|unique:type_method,metodo',
        ]);

        $datos = TypeMethod::find($id);

        $datos->update($request->all());

        return redirect()->route('method.index')->with('success', 'Datos actualizados correctamente.');
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
        $ficha = TypeMethod::select(
            'id',
            'metodo',
            'status',
        )->get();
        return DataTables::of($ficha)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("specialty.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->rawColumns(['accion'])->make();
    }
}
