<?php

namespace App\Http\Controllers\API;

use DB;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reclutamiento\Vacant;
use App\Http\Requests\PostulantRequest;
use App\Models\Reclutamiento\Postulant;
use Illuminate\Support\Facades\Validator;
use App\Models\Reclutamiento\PostulantFamily;
use App\Models\Reclutamiento\PostulantLicence;
use App\Models\Reclutamiento\PostulantDocument;
use App\Models\Reclutamiento\PostulantReference;
use App\Models\Reclutamiento\PostulantTrajectory;

class PostulanteController extends Controller
{
    public function index($id)
    {
        $datos = Vacant::select(
            'id',
            'imagen_url',
            'puesto_id',
            'sucursal_id',
            'cantidad',
            'requisitos',
            'funcion',
            'salario',
            'prestaciones',
            'horario',
            'reclutador_id',
            'status',
        )->where('status',1)->with(['empleado'=> function ($query){
            $query->select('id', 'nombre','apellido_paterno', 'apellido_materno');
        }])->with(['puesto'=> function ($query){
            $query->select('id', 'puesto');
        }])->with(['sucursal'=> function ($query){
            $query->select('id', 'sucursal');
        }])->find($id);

        $array = json_decode($datos, true);
        return $this->sendResponse($array, 'Lista de Vacantes', 200);
    }

    public function guardar(PostulantRequest $request)
    {
        $validator = Validator::make( [
            'vacante_id' => 'required',
            'puesto_id' => 'required',
            'sucursal_id' => 'required',
            'fecha_postulacion' => 'required',
            'sueldo_pretendido' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'edad' => 'required',
            'lugar_nacimiento' => 'required',
            'fecha_nacimiento' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'numero_seguro_social' => 'required',
            'licencia_conducir' => 'required',
            // 'cartilla_militar' => 'required', opcional
            'correo_electronico' => 'required',
            'telefono' => 'required',
            'estado_civil'=> 'required',
            'vive_con'=> 'required',

            'ciudad'=> 'required',
            'estado'=> 'required',
            'municipio'=> 'required',
            'colonia'=> 'required',
            'entre_calles'=> 'required',
            'numero_casa'=> 'required',
            'codigo_postal'=> 'required',
            'direccion'=> 'required',

            'ultimo_grado_estudios'=> 'required',
            'institucion'=> 'required',
            'especialidad'=> 'required',
            'certificado'=> 'required',
            'titulo'=> 'required',
            'estudia_actualmente'=> 'required',

            'idiomas'=> 'required',
            'maquinas_software'=> 'required',
            'otros_oficios'=> 'required',
            'datos_manejo'=> 'required',
            'gasto_mensual'=> 'required',

            'como_entero' => 'required',
            // 'otros_entero'=> 'required',
            'parientes'=> 'required',
            // 'parientes_nombre'=> 'required',
            'afianzado'=> 'required',
            // 'nombre_cia'=> 'required',
            'sindicato'=> 'required',
            // 'nombre_sindicato'=> 'required',
            'seguro'=> 'required',
            // 'nombre_seguro'=> 'required',
            'viajar'=> 'required',
            // 'razones_viajar'=> 'required',
            'residencia'=> 'required',
            // 'razones_residencia'=> 'required',
            'espera_oferta_laboral'=> 'required',
            'fecha_trabajar'=> 'required',
            
            'otro_ingreso'=> 'required',
            // 'importe_mensual'=> 'required',
            // 'cual_ingreso'=> 'required',
           // 'conyuge_trabaja'=> 'required',
            // 'importe_conyuge'=> 'required',
            // 'conyuge_donde'=> 'required',
            'paga_renta'=> 'required',
            // 'importe_renta'=> 'required',
            // 'casa_propia'=> 'required',
            'auto_propio'=> 'required',
            // 'marca'=> 'required',
            // 'modelo'=> 'required',
            'deudas'=> 'required',
            // 'importe_deuda',
            // 'abono_mensual',
            // 'gasto_mensual',
        ]);

        // if($request->titulo == 'si'){
        //     $validator = Validator::make( [
        //     'cedula' => 'required',
        //     ]);
        // }else{
        //     $validator = Validator::make( [
        //         'trunco' => 'required',
        //     ]);
        // }

        // if($request->estudia_actualmente == 'si'){
        //     $validator = Validator::make( [
        //         'institucion_actual' => 'required',
        //         'carrera_actual'=> 'required',
        //         'semestre_actual'=> 'required',
        //         'horario_actual'=> 'required',
        //     ]);
        // }

        // if($request->paga_renta == 'si'){
        //     $validator = Validator::make( [
        //         'importe_renta'=> 'required',
        //     ]);
        // }

        // if($request->deudas == 'si'){
        //     $validator = Validator::make( [
        //         'importe_deuda'=> 'required',
        //         'abono_mensual'=> 'required',
        //     ]);
        // }

        // if($request->auto_propio == 'si'){
        //     $validator = Validator::make( [
        //         'marca'=> 'required',
        //         'modelo'=> 'required',
        //     ]);
        // }

        // if($request->estado_civil == 'casado'){
        //     $validator = Validator::make( [
        //         'conyuge_trabaja'=> 'required',
        //         'importe_conyuge'=> 'required',
        //         'conyuge_donde'=> 'required',
        //     ]);
        // }

        // if ($validator->fails()) {
        //     return response()->withErrors($validator)->withInput();
        //     // return response()->json($validator->messages(), 400);
        // }
        DB::beginTransaction();
        $postulante = Postulant::create([
            'vacante_id'=> $request->vacante_id,
            'fecha_postulacion'=> $request->fecha_postulacion,
            'sueldo_pretendido'=> $request->sueldo_pretendido,
            'nombre'=> $request->nombre,
            'apellido_paterno'=> $request->apellido_paterno,
            'apellido_materno'=> $request->apellido_materno, 
            'sexo'=> $request->sexo,
            'edad'=> $request->edad,
            'lugar_nacimiento'=> $request->lugar_nacimiento,
            'fecha_nacimiento'=> $request->fecha_nacimiento,
            'curp'=> $request->curp,
            'rfc'=> $request->rfc,
            'numero_social'=> $request->numero_seguro_social,
            'licencia_conducir'=> $request->licencia_conducir,
            'cartilla'=> $request->cartilla_militar,
            'correo'=> $request->correo_electronico,
            'telefono'=> $request->telefono,
            'estado_civil'=> $request->estado_civil,
            'vive_con'=> $request->vive_con,
            
            'direccion'=> $request->direccion,
            'numero_casa'=> $request->numero_casa,
            'entre_calles'=> $request->entre_calles,
            'colonia'=> $request->colonia,
            'ciudad'=> $request->ciudad,
            'estado'=> $request->estado,
            'municipio'=> $request->municipio,
            'codigo_postal'=> $request->codigo_postal,

            'ultimo_grado_estudios'=> $request->ultimo_grado_estudios,
            'institucion'=> $request->institucion,
            'especialidad'=> $request->especialidad,
            'certificado'=> $request->certificado,
            'titulo'=> $request->titulo,
            'cedula'=> $request->cedula,
            'trunco'=> $request->trunco,
            'estudia_actualmente'=> $request->estudia_actualmente,
            'institucion_actual'=> $request->institucion_actual,
            'carrera_actual'=> $request->carrera_actual,
            'semestre_actual'=> $request->semestre_actual,
            'horario_actual'=> $request->horario_actual,

            'idiomas'=> $request->idiomas,
            'maquina_software'=> $request->maquinas_software,
            'oficios_domines'=> $request->otros_oficios,
            'datos_manejo'=> $request->datos_manejo,

            'como_entero'=> $request->como_entero,
            'otros_entero'=> $request->otros_entero,
            'parientes'=> $request->parientes,
            'parientes_nombre'=> $request->parientes_nombre,
            'afianzado'=> $request->afianzado,
            'nombre_cia'=> $request->nombre_cia,
            'sindicato'=> $request->sindicato,
            'nombre_sindicato'=> $request->nombre_sindicato,
            'seguro'=> $request->seguro,
            'nombre_seguro'=> $request->nombre_seguro,
            'viajar'=> $request->viajar,
            'razones_viajar'=> $request->razones_viajar,
            'residencia'=> $request->residencia,
            'razones_residencia'=> $request->razones_residencia,
            'espera_oferta_laboral'=> $request->espera_oferta_laboral,
            'fecha_trabajar'=> $request->fecha_trabajar,

            'otro_ingreso'=> $request->otro_ingreso,
            'importe_mensual'=> $request->importe_mensual,
            'cual_ingreso'=> $request->cual_ingreso,
            'conyuge_trabaja'=> $request->conyuge_trabaja,
            'importe_conyuge'=> $request->importe_conyuge,
            'conyuge_donde'=> $request->conyuge_donde,
            'paga_renta'=> $request->paga_renta,
            'importe_renta'=> $request->importe_renta,
            'casa_propia'=> $request->casa_propia,
            'auto_propio'=> $request->auto_propio,
            'marca'=> $request->marca,
            'modelo'=> $request->modelo,
            'deudas'=> $request->deudas,
            'importe_deuda'=> $request->importe_deuda,
            'abono_mensual'=> $request->abono_mensual,
            'gasto_mensual'=> $request->gasto_mensual
        ]);
       
        if($request->tipo_licencia > 0 ){
            foreach ($request->tipo_licencia as $licencia) {
                PostulantLicence::create([
                    'postulante_id'=> $postulante->id,
                    'tipo_licencia'=> $licencia,
                ]);
            }
        }
        
        if($request->referencia_familiar > 0 ){
            foreach ($request->referencia_familiar as $familiar) {
                PostulantFamily::create([
                    'postulante_id'=> $postulante->id,
                    'nombre'=> $familiar['nombre_familiares'],
                    'ocupacion'=> $familiar['ocupacion_familiares'],
                    'parentesco'=> $familiar['parentesco_familiares'],
                    'edad'=> $familiar['edad_familiares'],
                    'telefono'=> $familiar['telefono_familiares'],
                    'domicilio'=> $familiar['domicilio_familiares'],
                    'vive'=> $familiar['vive_familiar'],
                    'depende'=> $familiar['depende_familiares'],
                ]);
            }
        }
        
        if($request->referencia_personal > 0 ){
            foreach ($request->referencia_personal as $personal) {
                PostulantReference::create([
                    'postulante_id'=> $postulante->id,
                    'nombre'=> $personal['nombre_referencia'],
                    'ocupacion'=> $personal['ocupacion_referencia'],
                    'edad'=> $personal['edad_referencia'],
                    'telefono'=> $personal['telefono_referencia'],
                    'domicilio'=> $personal['domicilio_referencia'],
                ]);
            }
        }
        
        foreach ($request->trayectoria_laboral as $trajectoria) {
            if($trajectoria['empresa'] != '' && $trajectoria['fecha_ingreso'] != '' && $trajectoria['fecha_baja'] != '' 
            &&  $trajectoria['puesto'] != '' && $trajectoria['domicilio_empresa'] != ''){
                PostulantTrajectory::create([
                    'postulante_id'=> $postulante->id,
                    'empresa'=> $trajectoria['empresa'],
                    'fecha_ingreso'=> $trajectoria['fecha_ingreso'],
                    'fecha_baja'=> $trajectoria['fecha_baja'],
                    'puesto'=> $trajectoria['puesto'],
                    'sueldo_inicial'=> $trajectoria['sueldo_inicial'],
                    'sueldo_final'=> $trajectoria['sueldo_final'],
                    'dias_cobro'=> $trajectoria['dias_cobro'],
                    'pedir_referencia'=> $trajectoria['pedir_referencia'],
                    'select_carta'=> $trajectoria['select_carta'],
                    'select_constancia'=> $trajectoria['select_constancia'],
                    'motivo_salida'=> $trajectoria['motivo_salida'],
                    'otro_motivo_salida'=> $trajectoria['otro_motivo_salida'],
                    'domicilio_empresa'=> $trajectoria['domicilio_empresa'],
                    'jefe'=> $trajectoria['jefe'],
                    'puesto_jefe'=> $trajectoria['puesto_jefe'],
                    'telefono_jefe'=> $trajectoria['telefono_jefe']
                ]);
            }
        }

        $cvPdf = null;
        if($request->documentos['cv_file']){
            $fileName = time();
            $cvPdf = $this->uploadS3Base64("{$fileName}.pdf", $request->documentos['cv_file'], 'postulante');
            PostulantDocument::create([
                'postulante_id'=> $postulante->id,
                'imagen_url'=> $cvPdf['url'],
            ]);
        }

        $imagen = null;
        if($request->documentos['carta_recomendacion']){
            $fileName = time();
            $imagen = $this->uploadS3Base64("{$fileName}.pdf", $request->documentos['carta_recomendacion'], 'postulante');
            PostulantDocument::create([
                'postulante_id'=> $postulante->id,
                'imagen_url'=> $imagen['url'],
            ]);
        }
        
        DB::commit();
        $pdf = base64_encode($this->solicitudPDF($postulante->id));

        return $this->sendResponse(['postulante' => $postulante, 'pdf' => $pdf], 'Datos del postulante', 200);
    }

    public function solicitudPDF($id)
    {       
        $datos = Postulant::with(['vacantes'=> function ($query){
            $query->select('id', 'puesto_id','sucursal_id', 'reclutador_id')->with(['puesto'=> function ($query){
                $query->select('id', 'puesto');
            }])->with(['sucursal'=> function ($query){
                $query->select('id', 'sucursal');
            }])->with(['empleado'=> function ($query){
                $query->select('id', 'nombre','apellido_paterno','apellido_materno');
            }]);
        }])->find($id);
        $pdf = PDF::loadView('components.reclutamiento.postulant.solicitud', compact('datos'));
        return $pdf->stream($datos->nombre);
    }
}
