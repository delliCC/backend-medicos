<?php

namespace App\Http\Controllers;

use DataTables;
use Vimeo\Vimeo;
use App\Models\TabIndicates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TabIndicatesController extends Controller
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
            ['link'=>"javascript:void(0)", 'name'=>"Ficha Indica"]
        ];
        return view('/pages/tabIndicates/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
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
            'nombre'=> 'required|string|unique:tab_indicates,especialidad',
            'url'=> 'required|string|unique:tab_indicates,especialidad',
            'descripcion'=> 'required|string|unique:tab_indicates,especialidad',
        ]);

        TabIndicates::create($request->all());
        return $this->sendResponse();
        // $factura = Factura::where('factura', $this->nombreFactura)->first();

        // if ($factura) {
        //     $arrayArchivos = [];
        //     foreach ($this->archivos as $archivo) {
        //         $urlArchivo = $this->uploadS3Base64($archivo['fullName'], $archivo['file']);
        //         if ($urlArchivo) {
        //             $pos = strpos($urlArchivo['url'], '.xml');

        //             if ($pos !== false) {
        //                 $arrayArchivos['url_xml'] = $urlArchivo['url'];
        //             } else {
        //                 $arrayArchivos['url_pdf'] = $urlArchivo['url'];
        //             }
        //         }
        //     }

        //     if ([] !== $arrayArchivos) {
        //         ArchivoFactura::create([
        //             'url_pdf' => $arrayArchivos['url_pdf'],
        //             'url_xml' => $arrayArchivos['url_xml'],
        //             'factura_id' => $factura->id,
        //         ]);
        //     }
        // }
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
        // $breadcrumbs = [
        //     ['link'=>"medicos", 'name'=>"Lista de Médicos"], ['name'=>"Editar"]
        // ];

        // $ficha = TabIndicates::find($id);

        // return view('/pages/medicos/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $ficha]);
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
            'nombre'=> 'required|string|unique:tab_indicates,especialidad',
            'url'=> 'required|string|unique:tab_indicates,especialidad',
            'descripcion'=> 'required|string|unique:tab_indicates,especialidad',
        ]);

        $datos = TabIndicates::find($id);

        $datos->update($request->all());

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
        $ficha = TabIndicates::select(
            'id',
            'nombre',
            'url',
            'descripcion',
            'status',
        )->get();
        return DataTables::of($ficha)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("specialty.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.tabIndicates.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function uploadS3Base64($fileName, $fileBase64, $path = '')
    {
        $file = $path ."". $fileName;

        Storage::disk('s3')->put($file, base64_decode($fileBase64), 'public');

        // $url = Storage::temporaryUrl(
        //     $fileName, now()->addMinutes(1)
        // );

        return [
            'url' => Storage::disk('s3')->getAdapter()->getClient()->getObjectUrl('facturas', $file),
            'path' => $file,
        ];
    }
}
