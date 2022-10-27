<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $permissions = Permission::all()->pluck('name','id');
        // , compact('permissions')
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "index"]];
        return view('/pages/roles/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
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
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:roles'
        ]);

        if (count($validation->errors()) > 0) {
            return response()->json(["error" => $validation->errors()], 422);
        }

        $role = Role::create($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol = Role::find($id);

        $rol->update($request->all());

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
        $datos = Role::select(
            'id',
            'name'
        )->get();

        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a onclick="editarRol('.$row->id.',`'.$row->name.'`)" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            $btn .= '<a href="'.route("roles.asignacion", $row->id).'" class="btn btn-outline-success btn-sm"><i data-feather="list"></i></a>';
            return $btn;
        })->rawColumns(['accion'])->make();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function asignacion($id)
    {
        $breadcrumbs = [
            ['link'=>"roles", 'name'=>"Lista de rutas"], ['name'=>"Rutas"]
        ];
        $datos = Role::find($id);
        $rutas = Permission::all()->pluck('name','id');
        return view('/pages/roles/asignacion', ['breadcrumbs' => $breadcrumbs, 'datos' => $datos], compact('rutas'));

    }
    
    public function asignacionGuardar(Request $request)
    {
        return $request;
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:roles'
        ]);

        if (count($validation->errors()) > 0) {
            return response()->json(["error" => $validation->errors()], 422);
        }

        $role = Role::create($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    } 
}
