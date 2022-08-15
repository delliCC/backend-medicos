<?php

namespace App\Http\Controllers;

use App\Models\specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = specialty::all();
        $pageConfigs = ['blankPage' => false];
        $breadcrumbs = [['link' => "javascript:void(0)", 'name' => "Catálogos"], ['link' => "javascript:void(0)", 'name' => "Especialidades"]];
        return view('/pages/specialty', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'datos'=>$datos]);
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
            'especialidad' => 'required|string'
        ]);
        
        // return $request;
        specialty::create($request->all());
        return redirect('/especialidades')->with('message', 'Datos guardados correctamente');
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
        $datos = specialty::find($id);
        return $datos;
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
        $datos = specialty::find($id);
        $datos->update($request->all());
        return redirect('/especialidades')->with('message', 'Datos editados correctamente');
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

    public function status($id, $estado)
    {
        $datos = specialty::findOrFail($id);
        if ($datos->status === 1) {
            $datos->status = $estado;
            $datos->save();
            return 'cambio: activo a '.$estado;
        }else{
            
            $datos->status = $estado;
            $datos->save();
            return 'cambio: inactivo a '. $estado;
        }
        return $datos;
    }
}
