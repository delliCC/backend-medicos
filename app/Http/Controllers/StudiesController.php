<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Studies;
use App\Models\TypeMethod;
use App\Models\TypeSample;
use Illuminate\Http\Request;

class StudiesController extends Controller
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
        return view('/pages/studies/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMetodo = TypeMethod::select('id','metodo','status')->where('status',1)->get();
        $tipoMuestra = TypeSample::select('id','muestra','status')->where('status',1)->get();
        $breadcrumbs = [
            ['link'=>"javascript:void(0)",'name'=>"Estudios"], ['name'=>"Crear"]
        ];
       
        return view('/pages/studies/create', ['breadcrumbs' => $breadcrumbs], compact(['tipoMuestra','tipoMetodo']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'metodo_id' => 'required',
            'muestra_id' => 'required',
            'informacion_clinica' => 'required',
        ]);

       
        Studies::create($request->all());

        return redirect()->route('studies.index')->with('success', 'Datos guardados correctamente.');
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
        $tipoMetodo = TypeMethod::select('id','metodo','status')->where('status',1)->get();
        $tipoMuestra = TypeSample::select('id','muestra','status')->where('status',1)->get();

        $breadcrumbs = [
            ['link'=>"medicos", 'name'=>"Lista de Estudios"], ['name'=>"Editar"]
        ];

        $estudios = Studies::find($id);

        return view('/pages/studies/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $estudios], compact(['tipoMuestra','tipoMetodo']));
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'metodo_id' => 'required',
            'muestra_id' => 'required',
            'informacion_clinica' => 'required',
        ]);

        $estudios = Studies::find($id);

        $estudios->update($request->all());

        return redirect()->route('studies.index')->with('success', 'Datos actualizados correctamente.');
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
        $datos = Studies::select(
            'id',
            'titulo',
            'descripcion',
            'metodo_id',
            'muestra_id',
            'informacion_clinica',
            'status'
        )->with(['metodo'=> function ($query){
            $query->select('id', 'metodo');
        }])->with(['muestra'=> function ($query){
            $query->select('id', 'muestra');
        }])->get();

        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("studies.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('metodo', function($row) {
            return  $row->metodo->metodo;
        })->addColumn('muestra', function($row) {
            return  $row->muestra->muestra;
        })->addColumn('status', function($row) {
            return view('components.studies.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Studies::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
