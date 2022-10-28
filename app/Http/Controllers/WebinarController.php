<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Vimeo\Laravel\VimeoManager;
use Vinkla\Vimeo\Facades\Vimeo;
use Illuminate\Support\Facades\Validator;

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

    // public function vimeo(Request $request)
    // {
    //     return view('vimeo')->with([]);
    // }
 
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
      //  return $request->all();
        // $this->validate($request, [
        //     'nombre'=> 'required|string|unique:webinar,nombre',
        //     'descripcion'=> 'required|string|unique:webinar,descripcion',
        //     'webinar_url'=> 'required|mimetypes:video/mp4,video/mpeg,video/quicktime|max:60000',
        // ]);
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

        // $uri = $vimeo->upload($request->webinar_url,[
        //     'nombre'=> $request->nombre,
        //     'descripcion'=> $request->descripcion
        // ]);
        ini_set('max_execution_time', 600);
        ini_set('memory_limit', '2048M');
 
        $limite = 500000; // Límite en kilobytes
 
        // $validator = Validator::make($request->all(), [
        //     'video' => "required|max:{$limite}"
        // ]);
        
        // return $validator;
        // if ($validator->fails()) {
        //     return redirect()->route('webinar.index')->with('mensajeError', 'Error, excede el limite de tamaño');
        // }
        // return $request->all();
        // if ($validator->passes()) {

            $file = $request->file('webinar_url')->move(
                base_path() . '/storage/video/',
                $request->file('webinar_url')->getClientOriginalName()
            );
            // $file = $request->file('webinar_url');
            // $destinationPath = base_path('/storage/video/');
            // $file->move($destinationPath . $file->getClientOriginalName());
        
            #orginal
            $url = Vimeo::upload($file);
            // \Log::debug($file .'video enviado');
            // With parameters.
            // $url =  Vimeo::connection()->upload($file);
            // $url =  Vimeo::upload($file, [
            //     'name' => 'Ada',
            //     'privacy' => [
            //         'view' => 'anybody',
            //         "link"=> $url
            //     ]
            // ]);
            unlink($file);

            return $url;
            $datosVimeo = Vimeo::request($url);
    
            $test = $datosVimeo['body'];
                $vimeo_id = str_replace("/videos/", "", $datosVimeo['body']['uri']);
            $this->editVimeo($vimeo_id);
        // }
            
        return $datosVimeo;
        return $request->all();
        $imagenFichaIndica = null;
        if(true === $request->hasFile('ficha_url')){
            $fileBase64 = base64_encode(file_get_contents($request->file('ficha_url')));
            $fileName = time();

            $imagenFichaIndica = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'webinar');
        }

        $imagenPortada = null;
        if(true === $request->hasFile('imagen_portada')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen_portada')));
            $fileName = time();

            $imagenPortada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'webinar');
        }

        $fotoMedico = null;
        if(true === $request->hasFile('imagen_medico_url')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen_medico_url')));
            $fileName = time();

            $fotoMedico = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'webinar');
        }
       // return  $imagenPortada;
        DB::beginTransaction();

        Webinar::create([
            'nombre'=>$request->nombre,
            'webinar_url'=> 'ii',
            'descripcion'=> $request->descripcion,
            'ficha_nombre'=> $request->ficha_nombre,
            'ficha_url'=>$imagenFichaIndica['url'],
            'ficha_descripcion'=> $request->ficha_descripcion,
            'fecha_inicio'=> $request->fecha_inicio,
            'preview_imagen'=> $imagenPortada['url'],
            'trailer_url'=> 'ii',
            'nombre_medico'=> $request->nombre_medico,
            'imagen_medico_url'=> $fotoMedico['url'],
            'especialidad'=> $request->especialidad,
        ]);
        DB::commit();
        return redirect()->route('webinar.index')->with('success', 'Datos guardados correctamente.');
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
            ['link'=>"javascript:void(0)", 'name'=>"Webinar"], ['name'=>"Editar"]
        ];
    
        $datos = Webinar::find($id);
        // return $datos->puesto->puesto;
        return view('/pages/webinar/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
    }

    public function editVimeo($id)
    {
        Vimeo::request("/videos/{$id}", [
            'privacy' => [
                'view' => 'unlisted',
                'embed' => 'whitelist'
            ],
            'embed' => [
                'buttons' => [
                    'embed' => false,
                    'fullscreen' => true,
                    'share' => false,
                    'watchlater' => false
                ],
                'logos' => [
                    'vimeo' => false
                ],
                'title' => [
                    'name' => 'rh',
                    'owner' => 'hide',
                    'portrait' => 'hide'
                ]
            ]
        ], 'PATCH');
        $domains = [
             'laboratorioschontalpa.com.mx',
             'localhost'
        ];

        foreach ($domains as $domain) {
            return Vimeo::request("/videos/{$id}/privacy/domains/{$domain}", [], 'PUT');
        }
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
            $btn .= '<a href="'.route("sample.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
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
