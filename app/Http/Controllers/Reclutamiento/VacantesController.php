<?php

namespace App\Http\Controllers\Reclutamiento;

use DB;
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
            // 'imagen'=>'required|image',
        ]);

        $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
        $fileName = time();

        $imagen = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'vacantes');
        // DB::beginTransaction();

        foreach($request->sucursal_id as $sucursal_id){
            $verificar = Vacant::select("*")->where('sucursal_id',$sucursal_id)
            ->where('puesto_id',$request->puesto_id)->where("status",1)->get();
    
            if (count($verificar) > 0){
                return redirect()->route('vacant.index')->with('success', 'Este registro capturado ya existe.',[],400);
                // return redirect()->route('vacant.index')->json([
                //     'message' => 'Este registro capturado ya existe.'
                // ], 404);
                // return $this->forbiddenResponse('Este registro capturado ya existe.', [], 400);
            }
            $datos = Vacant::create([
                'puesto_id'=> $request->puesto_id,
                'sucursal_id'=> $sucursal_id,
                'cantidad'=> $request->cantidad,
                'requisitos'=> $request->requisitos,
                'funcion'=> $request->funcion,
                'salario'=> $request->salario,
                'prestaciones'=> $request->prestaciones, 
                'horario'=> $request->horario,
                'reclutador_id'=> $request->reclutador_id,
                'imagen'=>$imagen['url']
            ]);
        }

        // DB::commit();
        return redirect()->route('vacant.index')->with('success', 'Datos guardados correctamente.');
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
        $sucursales = Sucursales::select('id','sucursal','status')->where('status',1)->get();
        $empleados = Employees::select('id','nombre','status')->where('status',1)->get();
        $puestos = Puestos::select('id','puesto','status')->where('status',1)->get();

        $datos = Vacant::with(['empleado'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        }])->with(['puesto'=> function ($query){
            $query->select('id', 'puesto');
        }])->with(['sucursal'=> function ($query){
            $query->select('id', 'sucursal');
        }])->find($id);
        
        // return $datos->puesto->puesto;
        return view('/pages/reclutamiento/vacantes/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos], compact('sucursales', 'empleados','puestos'));
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
        ]);

        $imagen = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagen = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'vacantes');
        }
        // DB::beginTransaction();

        foreach ($request->sucursal_id as $sucursal_id){
            $vacanteExiste = Vacant::where('sucursal_id',$sucursal_id)->where('puesto_id',$request->puesto_id)->where("status",1)->first();
    
            if (null !== $vacanteExiste) {
                return redirect()->route('vacant.index')->with('success', 'Este registro capturado ya existe.',[],400);
            }

            $datos = Vacant::find($id);

            $data = [
                'puesto_id' => $request->puesto_id,
                'sucursal_id' => $sucursal_id,
                'cantidad' => $request->cantidad,
                'requisitos' => $request->requisitos,
                'funcion' => $request->funcion,
                'salario' => $request->salario,
                'prestaciones' => $request->prestaciones, 
                'horario' => $request->horario,
                'reclutador_id' => $request->reclutador_id,
            ];

            if (null !== $imagen) {
                $data['imagen_url'] = $imagen['url'];
            }
    
            $datos->update($data);
        }

        // DB::commit();
        
        return redirect()->route('vacant.index')->with('success', 'Datos guardados correctamente.');
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
            'reclutador_id',
            'status'
        )->with(['empleado'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        }])->with(['puesto'=> function ($query){
            $query->select('id', 'puesto');
        }])->with(['sucursal'=> function ($query){
            $query->select('id', 'sucursal');
        }])->get();

        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("vacant.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('imagen_url', function($row) {
            return view('components.reclutamiento.vacantes.imagen', ['data' => $row]);
        })->addColumn('puesto_id', function($row) {
            return $row->puesto->puesto ;
        })->addColumn('sucursal_id', function($row) {
            return $row->sucursal->sucursal ;
        })->addColumn('reclutador_id', function($row) {
            return  $row->empleado->nombre .' '. $row->empleado->apellido_paterno .' '. $row->empleado->apellido_materno;
           
        })->addColumn('status', function($row) {
            return view('components.reclutamiento.vacantes.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }
}
