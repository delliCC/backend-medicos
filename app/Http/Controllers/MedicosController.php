<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use DataTables;
use Carbon\Carbon;

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
        $breadcrumbs = [
            ['link'=>"medicos",'name'=>"Médicos"], ['name'=>"Crear"]
        ];

        return view('/pages/medicos/create', ['breadcrumbs' => $breadcrumbs]);
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
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email|unique:users,email',
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
        )->get();
        return DataTables::of($medicos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("medicos.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->rawColumns(['accion'])->make();
    }
}
