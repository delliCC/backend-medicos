<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Sucursales;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Sucursales::select(
            'id',
            'sucursal',
            'correo',
            'telefono',
            'direccion',
            'pais',
            'estado',
            'municipio',
            'status',
        )->where('status', 1)->get();
        // ->with(['vacantes'=> function ($query){
        //     $query->select( 'id','imagen_url','puesto_id','sucursal_id','cantidad','requisitos',
        //     'funcion','salario','prestaciones','horario','reclutador_id','status')->where('status', 1)->with(['empleado'=> function ($query){
        //         $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        //     }])->with(['puesto'=> function ($query){
        //         $query->select('id', 'puesto');
        //     }])->with(['sucursal'=> function ($query){
        //         $query->select('id', 'sucursal');
        //     }]);
        // }])->where('status', 1)->get();

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Vacantes', 200);
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
}
