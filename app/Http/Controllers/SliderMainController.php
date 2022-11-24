<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Medicos\Slider;

class SliderMainController extends Controller
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
        return view('/pages/slider_main/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"slider",'name'=>"Slider"], ['name'=>"Crear"]
        ];
        return view('/pages/slider_main/create', ['breadcrumbs' => $breadcrumbs]);
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
            'descripcion' => 'required',
            'direccionar' => 'required',
        ]);

        $imagen = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagen = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'slider');
        }
       // return  $imagenPortada;
        DB::beginTransaction();

        Slider::create([
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion,
            'direccionar'=> $request->direccionar,
            'imagen'=>$imagen['url'],
        ]);
        DB::commit();
        return redirect()->route('slider.index')->with('success', 'Datos guardados correctamente.');
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
            ['link'=>"slider", 'name'=>"Slider"], ['name'=>"Editar"]
        ];

        $datos = Slider::find($id);
        
        // return $datos->puesto->puesto;
        return view('/pages/slider_main/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccionar' => 'required',
        ]);

        $imagen = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagen = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'slider');
        }
        DB::beginTransaction();
        
        // $vacanteExiste = Vacant::where('sucursal_id',$request->sucursal_id)->where('puesto_id',$request->puesto_id)->where("status",1)->first();

        // return $vacanteExiste;
        // if (count($vacanteExiste) > 1) {
        //     return redirect()->route('vacant.index')->with('success', 'Este registro capturado ya existe.',[],400);
        // }
       // return $request->all();
        $datos = Slider::find($id);

        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'direccionar'=> $request->direccionar,
        ];

        if (null !== $imagen) {
            $data['imagen'] = $imagen['url'];
        }
        $datos->update($data);
        DB::commit();
        return redirect()->route('slider.index')->with('success', 'Datos guardados correctamente.');
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
        $ficha = Slider::select(
            'id',
            'nombre',
            'imagen',
            'descripcion',
            'status'
        )->get();
        return DataTables::of($ficha)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("slider.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('imagen', function($row) {
            return view('components.slider_main.imagen', ['data' => $row]);
        })->addColumn('status', function($row) {
            return view('components.slider_main.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Slider::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
