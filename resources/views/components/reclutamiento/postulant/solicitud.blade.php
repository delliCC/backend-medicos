<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            @page {
                margin: 0cm 0cm;
            }
            body {
                font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, sans-serif;
                margin-top: 2cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 1cm;
            }    

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                {{--  position: fixed;
                top: -40px;
                left: 0px;
                right: 0px;  --}}
            }

            .head-title{
                text-align: center;
                font-size: 13px;
            }

            footer {
                position: fixed; 
                bottom: -45px; 
                left: 0cm; 
                right: 0cm;
            }
            .relleno {
                background-color: #F4F4F4;
            }

            .m-0{
                margin: 0px;
            }
            .p-0{
                padding: 0px;
            }
            .pt-5{
                padding-top:5px;
            }
            .mt-10{
                margin-top:10px;
            }
        
            .title {
                font-size: 15px;
            }

            .tablaBody {
                width: 100%;
                font-size: 13px;
                border-collapse: collapse;
                {{--  border-color: #ddd;  --}}
            }

        </style>
    </head>
    <body>
        <div style="height: 90px">
            <header>
                <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Header.png" id="blog-feature-image" width="100%" alt="encabezado"/>
            </header>
        </div>
        <div class="head-title">
            <h1 class="m-0 p-0">Solicitud de empleo</h1>
        </div>

        <table class="tablaBody" >
            <tr>
                <td width="20%">
                    <img src="#" width="80%" height="100"/>
                </td>
                <td width="80%">
                    <div class="table-section bill-tbl w-100 mt-10">
                        <table class="tablaBody" border="1">
                            <tbody>
                                <tr>
                                    <th colspan="2" scope="rowgroup">FECHA: {{$datos->fecha_postulacion}}</th>
                                </tr>
                                <tr>
                                    <td class="relleno"><strong>Puesto Solicitado:</strong> </td>
                                    <td width="60%">{{$datos->vacantes->puesto->puesto}}</td>
                                </tr>
                                <tr>
                                    <td class="relleno"><strong>Sucursal:</strong> </td>
                                    <td width="60%">{{$datos->vacantes->sucursal->sucursal}}</td>
                                </tr>
                                <tr>
                                    <td class="relleno"><strong>Sueldo pretendido mensual:</strong> </td>
                                    <td width="60%">${{$datos->sueldoPretendido}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <span class="title"><strong>Datos Personales</strong></span>
        <table class="tablaBody" border="1">
            <tr class="relleno">
                <th width="70%">Nombre completo</th>
                <th width="30%">Sexo</th>
            </tr>
            <tr>
                <td>{{ strtoupper($datos->nombre ) }} {{ strtoupper($datos->apellido_paterno ) }}</td>
                <td>{{ strtoupper($datos->sexo) }}</td>
            </tr>
            <tr class="relleno">
                <th>Lugar de Nacimiento</th>
                <th>Fecha de nacimiento</th>
            </tr>
            <tr>
                <td rowspan="2">{{ strtoupper($datos->lugar_nacimiento) }}</td>
                <td>{{ $datos->fecha_nacimiento }}</td>
            </tr>
            <tr>
                <td>
                    <table class="tablaBody" style="border: hidden">
                        <tr>
                            <th width="40%" class="relleno" style="border-right: 1px solid black;">Edad</th>
                            <td>{{ $datos->edad }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table class="tablaBody" border="1">
            <tr class="relleno">
                <th width="33%">CURP</th>
                <th width="33%">RFC</th>
                <th width="33%">Número social</th>
            </tr>
            <tr>
                <td>{{ strtoupper($datos->curp) }}</td>
                <td>{{ strtoupper($datos->rfc) }}</td>
                <td>{{ strtoupper($datos->numero_social) }}</td>
            </tr>
            <tr class="relleno">
                <th width="33%">Cartilla militar</th>
                <th width="33%">Licencia</th>
                <th width="33%">Correo eléctronico</th>
            </tr>
            <tr>
                <td>{{ strtoupper($datos->cartilla) }}</td>
                <td>{{ strtoupper($datos->licencia_conducir) }}</td>
                <td>{{ $datos->correo }}</td>
            </tr>
         </table>

        <span class="title"><strong>Dirección</strong></span>
        <table class="tablaBody" border="1">
            <tr class="relleno">
                <th width="70%" colspan="4">Calle</th>
                <th width="30%">Número de casa</th>
            </tr>
            <tr>
                <td colspan="4">{{ strtoupper($datos->direccion) }}</td>
                <td>{{ $datos->numero_casa }}</td>
            </tr>
            <tr class="relleno">
                <th width="70%" colspan="4">Entre calles</th>
                <th width="30%">Colonia</th>
            </tr>
            <tr>
                <td colspan="4">{{ strtoupper($datos->entre_calles) }}</td>
                <td>{{ strtoupper($datos->colonia) }}</td>
            </tr>
            <tr class="relleno">
                <th>Ciudad</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Código postal</th>
                <th>Teléfono</th>
            </tr>
            <tr>
                <td>{{ strtoupper($datos->ciudad) }}</td>
                <td>{{ strtoupper($datos->municipio) }}</td>
                <td>{{ strtoupper($datos->estado) }}</td>
                <td>{{ strtoupper($datos->codigo_postal) }}</td>
                <td>{{ strtoupper($datos->telefono) }}</td>
            </tr>
        </table>

        <span class="seccion"><strong>Datos familiares</strong></span>

        @foreach ($datos->familiares as $familiar)
            <table class="tablaBody" border="1">
                <tr class="relleno">
                    <th width="70%">Nombre completo</th>
                    <th width="30%">Parentesco</th>
                </tr>
                <tr>
                    <td>{{ strtoupper($familiar->nombre) }}</td>
                    @if($familiar->parentesco == 'mama')
                        <td>Mamá</td>
                    @elseif($familiar->parentesco == 'papa')
                        <td>Papá</td>
                    @else
                        <td>{{ strtoupper($familiar->parentesco) }}</td>
                    @endif
                </tr>
                <tr class="relleno">
                    <th>Domicilio</th>
                    <th>Ocupación</th>
                </tr>
                <tr>
                    <td rowspan="2">{{ strtoupper($familiar->domicilio) }}</td>
                    <td>{{ strtoupper( $familiar->ocupacion ) }}</td>
                </tr>
                <tr>
                    <td>
                        <table class="tablaBody" style="border: hidden">
                            <tr>
                                <th width="40%" class="relleno" style="border-right: 1px solid black;">Edad</th>
                                <td>{{ $familiar->edad }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>  
        @endforeach

        <span class="seccion"><strong>Datos Escolares</strong></span>
        <table class="tablaBody" border="1">
            <tr>
                <th class="relleno" width="25%">Último grado de estudios</th>
                <td colspan="7" width="75%">{{ strtoupper($datos->ultimo_grado_estudios) }}</td>
            </tr>
            <tr>
                <th class="relleno" width="25%">Institución</th>
                <td width="42%">{{ strtoupper($datos->institucion) }}</td>
                <th width="3%" class="relleno">CERTIF.</th>
                @if($datos->certificado == 'si')
                    <td width="3%" style="background-color: lightgray;">SI</td>
                    <td width="3%">NO</td>
                @else
                    <td width="3%">SI</td>
                    <td width="3%" style="background-color: lightgray;">NO</td>
                @endif
                <th width="3%" class="relleno">Titulo</th>
                @if($datos->titulo == 'si')
                    <td width="3%" style="background-color: lightgray;">SI</td>
                    <td width="3%">NO</td>
                @else
                    <td width="3%">SI</td>
                    <td width="3%" style="background-color: lightgray;">NO</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" width="25%">Especialidad</th>
                <td width="42%">{{ strtoupper($datos->especialidad) }}</td>
                <th width="3%" class="relleno">Ced. P.</th>
                @if($datos->cedula == 'si')
                    <td width="3%" style="background-color: lightgray;">SI</td>
                    <td width="3%">NO</td>
                @else
                    <td width="3%">SI</td>
                    <td width="3%" style="background-color: lightgray;">NO</td>
                @endif
                <th width="3%" class="relleno">Trunco</th>
                @if($datos->trunco == 'si')
                    <td width="3%" style="background-color: lightgray;">SI</td>
                    <td width="3%">NO</td>
                @else
                    <td width="3%">SI</td>
                    <td width="3%" style="background-color: lightgray;">NO</td>
                @endif
            </tr>
        </table>
        <table class="tablaBody" border="1">
            <tr>
                <th class="relleno" colspan="2">Estudias actualmente</th>
                @if($datos->estudia_actualmente == 'si')
                    <td width="5%" style="background-color: lightgray;">SI</td>
                    <td width="5%">NO</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray;">NO</td>
                @endif
                <td width="50%" style="border-right: none; border-top: none; border-bottom: none;">&nbsp;</td>
            </tr>
            <tr>
                <th class="relleno" colspan="3">Institución</th>
                <td colspan="2">{{ strtoupper($datos->institucion_actual) }}</td>
            </tr>
            <tr>
                <th class="relleno">Carrera</th>
                <td colspan="4">{{ strtoupper($datos->carrera_acutal) }}</td>
            </tr>
            <tr>
                <th class="relleno">Semestre</th>
                <td>{{ strtoupper($datos->semestre_actual) }}</td>
                <th colspan="2" class="relleno">Horario</th>
                <td>{{ strtoupper($datos->horario_actual) }}</td>
            </tr>
        </table>
        <div style="page-break-after:always;"></div>
{{--   
<span class="seccion"><strong>DOCUMENTACIÓN</strong></span>

<span class="seccion"><strong>CONOCIMIENTOS GENERALES</strong></span>
<table class="principal" border="1">
   <tr class="relleno">
       <th width="50%">IDIOMAS O LENGUAS QUE DOMINE</th>
       <th width="50%">MAQUINAS O SOFTWARE DE OFICINA QUE DOMINE</th>
   </tr>
   <tr>
       <td>{{ strtoupper($idiomas) }}</td>
       <td>{{ strtoupper($maquinas_software) }}</td>
   </tr>
   <tr class="relleno">
       <th colspan="2">OTROS TRABAJOS U OFICIOS QUE DOMINE</th>
   </tr>
   <tr>
       <td colspan="2">{{ strtoupper($otros_oficios) }}</td>
   </tr>
   <tr class="relleno">
       <th colspan="2">*EN CASO DE SABER CONDUCIR, INDIQUE EL TIPO DE UNIDAD VEHICULAR QUE HA MANEJADO (TONELADAS,
           TIPO)
       </th>
   </tr>
   <tr>
       <td colspan="2">{{ strtoupper($datos_manejo) }}</td>
   </tr>
</table>
 
<span class="seccion"><strong>REFERENCIAS PERSONALES (cite a tres personas que lo conozcan bien y a quienes podamos solicitar referencias suyas. No deben ser jefes anteriores ni parientes)</strong></span>
<table class="principal" border="1">
   <tr class="relleno">
       <th width="40%">NOMBRE</th>
       <th width="10%">OCUPACIÓN</th>
       <th width="5%">EDAD</th>
       <th width="10%">TELÉFONO</th>
       <th width="35%">DOMICILIO</th>
   </tr>
   <tr>
       <td>{{ strtoupper($nombre_referencia_1) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($ocupacion_referencia_1) }}</td>
       <td>{{ strtoupper($edad_referencia_1) }}</td>
       <td>{{ strtoupper($telefono_referencia_1) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($domicilio_referencia_1) }}</td>
   </tr>
   <tr>
       <td>{{ strtoupper($nombre_referencia_2) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($ocupacion_referencia_2) }}</td>
       <td>{{ strtoupper($edad_referencia_2) }}</td>
       <td>{{ strtoupper($telefono_referencia_2) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($domicilio_referencia_2) }}</td>
   </tr>
   <tr>
       <td>{{ strtoupper($nombre_referencia_3) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($ocupacion_referencia_3) }}</td>
       <td>{{ strtoupper($edad_referencia_3) }}</td>
       <td>{{ strtoupper($telefono_referencia_3) }}</td>
       <td style="font-size: 7px;">{{ strtoupper($domicilio_referencia_3) }}</td>
   </tr>
</table>
<div style="page-break-after:always;"></div>
<span class="seccion"><strong>TRAYECTORIA LABORAL (anotar sus dos trabajos más recientes)</strong></span>
<table class="principal" border="1">
   <tr>
       <th class="relleno">1. NOMBRE DE LA EMPRESA</th>
       <td colspan="3">{{ strtoupper($empresa_1) }}</td>
       <th class="relleno">2. NOMBRE DE LA EMPRESA</th>
       <td colspan="3">{{ strtoupper($empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">DOMICILIO</th>
       <td colspan="3">{{ strtoupper($domicilio_empresa_1) }}</td>
       <th class="relleno">DOMICILIO</th>
       <td colspan="3">{{ strtoupper($domicilio_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">TELÉFONO</th>
       <td colspan="3">{{ strtoupper($telefono_empresa_1) }}</td>
       <th class="relleno">TELÉFONO</th>
       <td colspan="3">{{ strtoupper($telefono_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">GIRO COMERCIAL</th>
       <td colspan="3">{{ strtoupper($giro_empresa_1) }}</td>
       <th class="relleno">GIRO COMERCIAL</th>
       <td colspan="3">{{ strtoupper($giro_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">FECHA DE INGRESO</th>
       <td colspan="3">{{ strtoupper($ingreso_empresa_1) }}</td>
       <th class="relleno">FECHA DE INGRESO</th>
       <td colspan="3">{{ strtoupper($ingreso_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">FECHA DE BAJA</th>
       <td colspan="3">{{ strtoupper($baja_empresa_1) }}</td>
       <th class="relleno">FECHA DE BAJA</th>
       <td colspan="3">{{ strtoupper($baja_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">ULTIMO PUESTO</th>
       <td colspan="3">{{ strtoupper($ultimo_puesto_empresa_1) }}</td>
       <th class="relleno">ULTIMO PUESTO</th>
       <td colspan="3">{{ strtoupper($ultimo_puesto_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">ULTIMO SUELDO</th>
       <td colspan="3">{{ strtoupper($ultimo_sueldo_empresa_1) }}</td>
       <th class="relleno">ULTIMO SUELDO</th>
       <td colspan="3">{{ strtoupper($ultimo_sueldo_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">PUESTO INICIAL</th>
       <td colspan="3">{{ strtoupper($puesto_inicial_empresa_1) }}</td>
       <th class="relleno">PUESTO INICIAL</th>
       <td colspan="3">{{ strtoupper($puesto_inicial_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">SUELDO INICIAL</th>
       <td colspan="3">{{ strtoupper($sueldo_inicial_empresa_1) }}</td>
       <th class="relleno">SUELDO INICIAL</th>
       <td colspan="3">{{ strtoupper($sueldo_inicial_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">JEFE INMEDIATO</th>
       <td colspan="3">{{ strtoupper($jefe_empresa_1) }}</td>
       <th class="relleno">JEFE INMEDIATO</th>
       <td colspan="3">{{ strtoupper($jefe_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">PUESTO</th>
       <td colspan="3">{{ strtoupper($puesto_empresa_1) }}</td>
       <th class="relleno">PUESTO</th>
       <td colspan="3">{{ strtoupper($puesto_empresa_2) }}</td>
   </tr>
   <tr>
       <th colspan="4" class="relleno">MOTIVO DE SALIDA</th>
       <th colspan="4" class="relleno">MOTIVO DE SALIDA</th>
   </tr>
   <tr>
       @if($motivo_salida_empresa_1 == 'renuncia_voluntaria')
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">HORARIOS</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_1 == 'horarios')
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">HORARIOS</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%"></td>
           <td width="20%">HORARIOS</td>
           <td width="5%">&nbsp;</td>
       @endif
       @if($motivo_salida_empresa_2 == 'renuncia_voluntaria')
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">HORARIOS</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_2 == 'horarios')
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">HORARIOS</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">RENUNCIA VOLUNTARIA</td>
           <td width="5%"></td>
           <td width="20%">HORARIOS</td>
           <td width="5%">&nbsp;</td>
       @endif
   </tr>
   <tr>
       @if($motivo_salida_empresa_1 == 'termino_contrato')
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">SALARIO</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_1 == 'salario')
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">SALARIO</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">SALARIO</td>
           <td width="5%">&nbsp;</td>
       @endif
       @if($motivo_salida_empresa_2 == 'termino_contrato')
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">SALARIO</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_2 == 'salario')
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">SALARIO</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">TERMINO DE CONTRATO</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">SALARIO</td>
           <td width="5%">&nbsp;</td>
       @endif
   </tr>
   <tr>
       @if($motivo_salida_empresa_1 == 'reanudacion_estudios')
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_1 == 'problemas_salud')
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%">&nbsp;</td>
       @endif
       @if($motivo_salida_empresa_2 == 'reanudacion_estudios')
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%" style="text-align: center;">X</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%">&nbsp;</td>
       @elseif($motivo_salida_empresa_2 == 'problemas_salud')
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%" style="text-align: center;">X</td>
       @else
           <td width="20%">REANUDACIÓN ESTUDIOS</td>
           <td width="5%">&nbsp;</td>
           <td width="20%">PROBLEMAS DE SALUD</td>
           <td width="5%">&nbsp;</td>
       @endif
   </tr>
   <tr>
       <td colspan="4">OTROS:</td>
       <td colspan="4">OTROS:</td>
   </tr>
   <tr>
       <th class="relleno">FUE LIQUIDADO</th>
       <td colspan="3">{{ strtoupper($liquidado_empresa_1) }}</td>
       <th class="relleno">FUE LIQUIDADO</th>
       <td colspan="3">{{ strtoupper($liquidado_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">LUGAR LIQUIDACIÓN</th>
       <td colspan="3">{{ strtoupper($lugar_liquidacion_empresa_1)  }}</td>
       <th class="relleno">LUGAR LIQUIDACIÓN</th>
       <td colspan="3">{{ strtoupper($lugar_liquidacion_empresa_2)  }}</td>
   </tr>
   <tr>
       <th class="relleno">PERTENECIÓ A SINDICATO</th>
       <td colspan="3">{{ strtoupper($pertenecio_sindicato_empresa_1) }}</td>
       <th class="relleno">PERTENECIÓ A SINDICATO</th>
       <td colspan="3">{{ strtoupper($pertenecio_sindicato_empresa_2) }}</td>
   </tr>
   <tr>
       <th class="relleno">NOMBRE DEL SINDICATO</th>
       <td colspan="3">{{ strtoupper($nombre_sindicato_empresa_1) }}</td>
       <th class="relleno">NOMBRE DEL SINDICATO</th>
       <td colspan="3">{{ strtoupper($nombre_sindicato_empresa_2) }}</td>
   </tr>
   <tr>
       <th colspan="4" class="relleno">COMPROBANTE LABORAL</th>
       <th colspan="4" class="relleno">COMPROBANTE LABORAL</th>
   </tr>
   <tr>
       <td width="20%">CARTA RECOMENDACIÓN</td>
       <td width="5%">{{ strtoupper($carta_recomendacion_empresa_1) }}</td>
       <td width="20%">CONSTANCIA LABORAL</td>
       <td width="5%">{{ strtoupper($constancia_laboral_empresa_1) }}</td>
       <td width="20%">CARTA RECOMENDACIÓN</td>
       <td width="5%">{{ strtoupper($carta_recomendacion_empresa_2) }}</td>
       <td width="20%">CONSTANCIA LABORAL</td>
       <td width="5%">{{ strtoupper($constancia_laboral_empresa_2) }}</td>
   </tr>
</table>
<br>
<table class="principal" border="1">
   <tr class="relleno">
       <th colspan="7">COMO SE ENTERÓ DE LA OFERTA DE EMPLEO (SI FUE POR UN AMIGO ESPECIFIQUE NOMBRE Y PUESTO EN LA
           EMPRESA)
       </th>
   </tr>
   <tr>
       @if($como_entero == 'internet')
           <td width="15%" style="background-color: lightgray;">INTERNET</td>
       @else
           <td width="15%">INTERNET</td>
       @endif
 
       @if($como_entero == 'publicidad')
           <td width="10%" style="background-color: lightgray;">PUBLICIDAD</td>
       @else
           <td width="10%">PUBLICIDAD</td>
       @endif
 
       @if($como_entero == 'perifoneo')
           <td width="15%" style="background-color: lightgray;">PERIFONEO</td>
       @else
           <td width="15%">PERIFONEO</td>
       @endif
 
       @if($como_entero == 'estatal_empleo')
           <td width="15%" style="background-color: lightgray;">ESTATAL DE EMPLEO</td>
       @else
           <td width="15%">ESTATAL DE EMPLEO</td>
       @endif
 
       @if($como_entero == 'periodico')
           <td width="10%" style="background-color: lightgray;">PERIODICO</td>
       @else
           <td width="10%">PERIODICO</td>
       @endif
 
       @if($como_entero == 'contacto')
           <td width="5%" style="background-color: lightgray; font-size: 6px;">CONTACTO</td>
           <td width="30%">{{ strtoupper($contacto) }}</td>
       @else
           <td width="5%" style="font-size: 6px;">CONTACTO</td>
           <td width="30%">&nbsp;</td>
       @endif
 
   </tr>
   <tr>
       @if($como_entero == 'redes_sociales')
           <td width="15%" style="background-color: lightgray;">REDES SOCIALES</td>
       @else
           <td width="15%">REDES SOCIALES</td>
       @endif
 
       @if($como_entero == 'lonas')
           <td width="10%" style="background-color: lightgray;">LONAS</td>
       @else
           <td width="10%">LONAS</td>
       @endif
 
       @if($como_entero == 'feria_empleo')
           <td width="15%" style="background-color: lightgray;">FERIA DE EMPLEO</td>
       @else
           <td width="15%">FERIA DE EMPLEO</td>
       @endif
 
       @if($como_entero == 'bolsa_trabajo')
           <td width="15%" style="background-color: lightgray;">UNIVERSIDAD(BOLSA)</td>
       @else
           <td width="15%">UNIVERSIDAD(BOLSA)</td>
       @endif
 
       @if($como_entero == 'volantes')
           <td width="10%" style="background-color: lightgray;">VOLANTES</td>
       @else
           <td width="10%">VOLANTES</td>
       @endif
 
       @if($como_entero == 'otros')
           <td width="5%" style="background-color: lightgray; font-size: 6px;">OTROS</td>
           <td width="30%">{{ strtoupper($otros_entero) }}</td>
       @else
           <td width="5%" style="font-size: 6px;">OTROS</td>
           <td width="30%">&nbsp;</td>
       @endif
 
   </tr>
</table>
<br>
<table class="principal" border="1">
   <tr>
       <th class="relleno" colspan="2">ESTA EN ESPERA DE ALGUNA OFERTA LABORAL</th>
       @if($espera_oferta_laboral == 'si')
           <td width="5%" style="background-color: lightgray">SI</td>
           <td width="5%">NO</td>
           <td width="50%" style="border-right: none; border-top: none; border-bottom: none;">&nbsp;</td>
       @else
           <td width="5%">SI</td>
           <td width="5%" style="background-color: lightgray">NO</td>
           <td width="50%" style="border-right: none; border-top: none; border-bottom: none;">&nbsp;</td>
       @endif
   </tr>
   <tr>
       <th class="relleno" colspan="2">ESPECIFIQUE EMPRESA</th>
       @if($especifique_empresa != null)
           <td colspan="3">{{ strtoupper($especifique_empresa) }}</td>
       @else
           <td colspan="3">&nbsp;</td>
       @endif
   </tr>
</table>  --}}
        <footer>
            <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Footer.png" id="blog-feature-image" width="100%" alt="encabezado"/>
        </footer>
    </body>
 
</html>
