<?php

namespace App\Http\Controllers;

use DataTables;
use Vimeo\Vimeo;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        return view('/pages/blog/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"medicos",'name'=>"blog"], ['name'=>"Crear"]
        ];

        return view('/pages/blog/create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $ficha = Blog::select(
            'id',
            'titulo',
            'imagen_destacada_url',
            'descripcion',
            'status',
        )->get();
        return DataTables::of($ficha)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("blog.edit", $row->id).'" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('status', function($row) {
            return view('components.blog.switch', ['data' => $row]);
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
