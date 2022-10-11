<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\TypeMethod;
use App\Models\TypeSample;
use Illuminate\Http\Request;
use App\Models\Studies\Studies;
use App\Models\Studies\StudieMethod;
use App\Models\Studies\StudieSample;

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

        $imagenDestacada = null;
        if(true === $request->hasFile('imagen_destacada')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen_destacada')));
            $fileName = time();

            $imagenDestacada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'estudios');
        }

        $imagenPortada = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagenPortada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'estudios');
        }

        DB::beginTransaction();
        $datos = Studies::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'informacion_clinica'=>$request->informacion_clinica,
            'precauciones'=>$request->precauciones,
            'imagen_destacada'=>$imagenDestacada['url'],
            'imagen_portada'=>$imagenPortada['url'],
        ]);

        foreach ($request->metodo_id as $metodo) {
            StudieMethod::create([
                'estudio_id'=> $datos->id,
                'metodo_id'=> $metodo,
            ]);
        }

        foreach ($request->muestra_id as $sample) {
            StudieSample::create([
                'estudio_id'=> $datos->id,
                'muestra_id'=> $sample,
            ]);
        }
       
        DB::commit();
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
            'precauciones'=> 'required',
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
            'informacion_clinica',
            'precauciones',
            'status'
        )->with(['metodos'=> function ($query){
            $query->select('*')->where('status',1)->with(['metodo'=> function ($query){
                $query->select('id', 'metodo');
            }]);
        }])->with(['muestras'=> function ($query){
            $query->select('*')->where('status',1)->with(['muestra'=> function ($query){
                $query->select('id', 'muestra');
            }]);
        }])->get();

        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("studies.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('metodo', function($row) {
            return view('components.studies.listMethod', ['data' => $row->metodos]);
        })->addColumn('muestra', function($row) {
            return view('components.studies.listSample', ['data' => $row->muestras]);
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
