<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Vimeo\Laravel\VimeoManager;

class WebinarController extends Controller
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
        return view('/pages/webinar/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"javascript:void(0)",'name'=>"Webinar"], ['name'=>"Crear"]
        ];
       
        return view('/pages/webinar/create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, VimeoManager $vimeo)
    {
        return $request->all();
        $this->validate($request, [
            'nombre'=> 'required|string|unique:webinar,nombre',
            'descripcion'=> 'required|string|unique:webinar,descripcion',
            'webinar_url'=> 'required|mimetypes:video/mp4,video/mpeg,video/quicktime|max:60000',
        ]);
        // 'nombre',
        // 'webinar_url',
        // 'descripcion',
        // 'ficha_nombre',
        // 'ficha_url',
        // 'ficha_descripcion',
        // 'fecha_inicio',
        // 'preview_imagen',
        // 'trailer_url',
        // 'nombre_medico',
        // 'imagen_medico_url',
        // 'especialidad',
        // 'status'
        // Webinar::create($request->all());
        $uri = $vimeo->upload($request->webinar_url,[
            'nombre'=> $request->nombre,
            'descripcion'=> $request->descripcion
        ]);

        dd($uri);

        // $imagenes = $request->imagenes;
        // foreach ($imagenes as $imagen) {
        //     $fileS3 = uploadS3($imagen, 'ficha-indica', randomString() . '-' . time());

        //     $datos = [
        //         'nombre' => $fileS3['filename'],
        //         'url' => $fileS3['route'],
        //         'descripcion' => $request->descripcion,
        //     ];
        //     // $evidencia = TabIndicates::create($datos);
        // }
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

    function listar()
    {
        $datos = Webinar::select(
            'id',
            'nombre',
            'webinar_url',
            'descripcion',
            'status'
        )->get();
        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("sample.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.webinar.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = Webinar::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
