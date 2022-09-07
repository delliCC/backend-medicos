<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::select('id','nombre','apellido_paterno','apellido_materno','status')->where('status',1)->get();
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "index"]];
        return view('/pages/users/index', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs], compact('medicos'));
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
            'name'=> 'required',
            'username'=> 'required|string|unique:users,username',
            'email'=> 'required',
            'medico_id'=> 'required',
            'password'=> 'required',
        ]);

        User::create($request->all());
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
        $datos = User::select(
            'id',
            'username',
            'email',
            'medico_id',
            'status'
        )->with(['medico'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno','apellido_materno');
        }])->get();
    
        return DataTables::of($datos)->addColumn('accion', function($row){
            $btn = '<div class="demo-inline-spacing">';
            $btn .= '<a onclick="editarUser('.$row->id.', `'.$row->username.'`,`'.$row->email.'`,`'.$row->medico_id.'`)" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#default"><i data-feather="edit"></i></a>';
            return $btn;
        })->addColumn('medico_id', function($row) {
            return  $row->medico->nombre .' '. $row->medico->apellido_paterno .' '. $row->medico->apellido_materno;
        })->addColumn('status', function($row) {
            return view('components.users.switch', ['data' => $row]);
        })->rawColumns(['accion'])->make();
    }

    public function changeStatus($id, $status)
    {
        $datos = User::find($id);

        $datos->status = $status == 'false' ? 0 : 1;

        $datos->save();

        return $this->sendResponse($datos);
    }
}
