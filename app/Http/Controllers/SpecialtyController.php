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
        $especialidad = specialty::select(
            'id',
            'especialidad',
            'status',
        )->get();
        return DataTables::of($especialidad)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a onclick="editarEspecilidad('.$row->id.', `'.$row->especialidad.'`)" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.specialty.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $especialidad = specialty::find($id);

        $especialidad->status = $status == 'false' ? 0 : 1;

        $especialidad->save();

        return $this->sendResponse($especialidad);
    }
}
