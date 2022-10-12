<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
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
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $imagenDestacada = null;
        if(true === $request->hasFile('imagen_destacada')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen_destacada')));
            $fileName = time();

            $imagenDestacada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'blog');
        }

        $imagenPortada = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagenPortada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'blog');
        }
       // return  $imagenPortada;
        DB::beginTransaction();

        Blog::create([
            'titulo'=> $request->titulo,
            'descripcion'=> $request->descripcion,
            'imagen_destacada'=>$imagenDestacada['url'],
            'imagen_portada'=>$imagenPortada['url'],
        ]);
        DB::commit();
        return redirect()->route('blog.index')->with('success', 'Datos guardados correctamente.');
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
            ['link'=>"blog", 'name'=>"blog"], ['name'=>"Editar"]
        ];

        $datos = Blog::find($id);
        return view('/pages/blog/edit', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos]);
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
        ]);

        $imagenDestacada = null;
        if(true === $request->hasFile('imagen_destacada')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen_destacada')));
            $fileName = time();

            $imagenDestacada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'blog');
        }

        $imagenPortada = null;
        if(true === $request->hasFile('imagen')){
            $fileBase64 = base64_encode(file_get_contents($request->file('imagen')));
            $fileName = time();

            $imagenPortada = $this->uploadS3Base64("{$fileName}.jpg", $fileBase64, 'blog');
        }

        DB::beginTransaction();

        $datos = Blog::find($id);

        $data = [
            'titulo'=> $request->titulo,
            'descripcion'=> $request->descripcion,
        ];

        if (null !== $imagenDestacada) {
            $data['imagen_destacada'] = $imagenDestacada['url'];
        }

        if (null !== $imagenPortada) {
            $data['imagen_portada'] = $imagenPortada['url'];
        }
        $datos->update($data);
        DB::commit();
        return redirect()->route('blog.index')->with('success', 'Datos guardados correctamente.');
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
            'imagen_destacada',
            'imagen_portada',
            'descripcion',
            'status',
        )->get();
        return DataTables::of($ficha)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a href="'.route("blog.edit", $row->id).'" class="btn btn-outline-info btn-sm"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('imagen_portada', function($row) {
            return view('components.blog.imagen', ['data' => $row]);
        })->addColumn('status', function($row) {
            return view('components.blog.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }
}
