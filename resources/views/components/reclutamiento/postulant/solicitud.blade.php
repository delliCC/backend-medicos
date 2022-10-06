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
                margin-top: 4cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }    

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
            }

            .head-title{
                text-align: center;
                font-size: 13px;
            }

            footer {
                position: fixed; 
                width: 100%;
                bottom: 0cm; 
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
        <header>
            <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Header.png" id="blog-feature-image" width="100%" alt="encabezado"/>
        </header>

       
        <div class="head-title">
            <h1 class="m-0 p-0">Solicitud de empleo</h1>
        </div>

        <table class="tablaBody">
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
            <tr class="relleno">
                <th colspan="2">Estado civil</th>
            </tr>
            <tr>
                <td colspan="2">{{ strtoupper($datos->estado_civil) }}</td>
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

        <span class="seccion"><strong>Conocimientos Generales</strong></span>
        <table class="tablaBody" border="1">
            <tr class="relleno">
                <th width="50%">Idiomas o lenguas que domine</th>
                <th width="50%">Maquinas o software de oficina que domine</th>
            </tr>
            <tr>
                <td>{{ strtoupper($datos->idiomas) }}</td>
                <td>{{ strtoupper($datos->maquina_software) }}</td>
            </tr>
            <tr class="relleno">
                <th colspan="2">Otros trabajos u oficios que domine</th>
            </tr>
            <tr>
                <td colspan="2">{{ strtoupper($datos->oficios_domines) }}</td>
            </tr>
            <tr class="relleno">
                <th colspan="2">*En caso de saber conducir, indique el tipo de unidad vehicular que ha manejado</th>
            </tr>
            <tr>
                <td colspan="2">{{ strtoupper($datos->datos_manejo) }}</td>
            </tr>
        </table>

        <div style="page-break-after:always;"></div>

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
                    <th>Ocupación</th>
                    <th>Depende económicamente</th>
                </tr>
                <tr>
                    <td rowspan="2">{{ strtoupper( $familiar->ocupacion ) }}</td>
                    <td>
                        <table class="tablaBody" style="border: hidden">
                            <tr>
                                @if($familiar->depende == 'si')
                                    <td width="5%" style="background-color: lightgray">SI</td>
                                    <td width="5%">NO</td>
                                @else
                                    <td width="5%">SI</td>
                                    <td width="5%" style="background-color: lightgray">NO</td>
                                @endif
                            </tr> 
                        </table>
                    </td>
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
                <tr class="relleno">
                    <th colspan="2">Domicilio</th>
                </tr>
                <tr>
                    <td colspan="2">{{ strtoupper($familiar->domicilio) }}</td>
                </tr>
            </table><br>
        @endforeach

        <span class="seccion"><strong>Referencias Personales</strong></span>

        @foreach ($datos->referencias as $referencia)
            <table class="tablaBody" border="1">
                <tr class="relleno">
                    <th width="70%">Nombre completo</th>
                    <th width="30%">Ocupación</th>
                </tr>
                <tr>
                    <td>{{ strtoupper($referencia->nombre) }}</td>
                    <td>{{ strtoupper($referencia->ocupacion) }}</td>
                </tr>
                <tr class="relleno">
                    <th>Teléfono</th>
                    <th>Edad</th>
                </tr>
                <tr>
                    <td>{{ strtoupper( $referencia->telefono) }}</td>
                    <td>{{ strtoupper( $referencia->edad ) }}</td>
                </tr>
                <tr class="relleno">
                    <th colspan="2" width="30%" colspan="2">Domicilio</th>
                </tr>
                <tr><td colspan="2">{{ strtoupper( $referencia->domicilio ) }}</td></tr>
            </table> <br>
        @endforeach
        
        <div style="page-break-after:always;"></div>

        <span class="seccion"><strong>Trayectoria laboral</strong></span>
        @foreach ($datos->trayectoria as $laboral)
            <table class="tablaBody" border="1">
                <tr>
                    <th class="relleno" width="25%">Nombre de la empresa</th>
                    <td colspan="3">{{ strtoupper($laboral->empresa) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Domicilio</th>
                    <td colspan="3">{{ strtoupper($laboral->domicilio_empresa) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Fecha de Ingreso</th>
                    <td colspan="3">{{ strtoupper($laboral->fecha_ingreso) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Fecha de Baja</th>
                    <td colspan="3">{{ strtoupper($laboral->fecha_baja) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Puesto</th>
                    <td colspan="3">{{ strtoupper($laboral->puesto) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%"> Sueldo Inicial</th>
                    <td colspan="3">{{ strtoupper($laboral->sueldo_inicial) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Último sueldo</th>
                    <td colspan="3">{{ strtoupper($laboral->sueldo_final) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Días de cobro</th>
                    <td colspan="3">{{ strtoupper($laboral->dias_cobro) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Jefe Inmediato</th>
                    <td colspan="3">{{ strtoupper($laboral->jefe) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Puesto</th>
                    <td colspan="3">{{ strtoupper($laboral->puesto_jefe) }}</td>
                </tr>
                <tr>
                    <th class="relleno" width="25%">Teléfono</th>
                    <td colspan="3">{{ strtoupper($laboral->telefono_jefe) }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="relleno">Motivo de salida</th>
                </tr>
                <tr>
                    @if($laboral->motivo_salida == 'renuncia')
                        <td width="20%">RENUNCIA VOLUNTARIA</td>
                        <td width="5%" style="text-align: center;">X</td>
                        <td width="20%">HORARIOS</td>
                        <td width="5%">&nbsp;</td>
                    @elseif($laboral->motivo_salida == 'horarios')
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
                    @if($laboral->motivo_salida == 'termino_contrato')
                        <td width="20%">TERMINO DE CONTRATO</td>
                        <td width="5%" style="text-align: center;">X</td>
                        <td width="20%">SALARIO</td>
                        <td width="5%">&nbsp;</td>
                    @elseif($laboral->motivo_salida == 'salario')
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
                    @if($laboral->motivo_salida == 'reanudacion_estudios')
                        <td width="20%">REANUDACIÓN ESTUDIOS</td>
                        <td width="5%" style="text-align: center;">X</td>
                        <td width="20%">PROBLEMAS DE SALUD</td>
                        <td width="5%">&nbsp;</td>
                    @elseif($laboral->motivo_salida == 'problemas_salud')
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
                    <td colspan="4">OTROS: {{ strtoupper($laboral->otro_motivo_salida) }}</td>
                </tr>
                <tr>
                    {{--  colspan="2"  --}}
                    <td>Carta de recomendación</td>
                    <td width="15%">
                        @if($laboral->select_carta == 'si')
                            <td width="3%" style="background-color: lightgray;">SI</td>
                            <td width="3%">NO</td>
                        @else
                            <td width="3%">SI</td>
                            <td width="3%" style="background-color: lightgray;">NO</td>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Constancia laboral</td>
                    <td width="5%">
                        @if($laboral->select_constancia == 'si')
                            <td width="3%" style="background-color: lightgray;">SI</td>
                            <td width="3%">NO</td>
                        @else
                            <td width="3%">SI</td>
                            <td width="3%" style="background-color: lightgray;">NO</td>
                        @endif
                    </td>
                </tr>
                <tr class="relleno">
                    <th colspan="4">¿Podemos pedir referencias?</th>
                </tr>
                <tr>
                    <td colspan="4">{{ strtoupper($laboral->pedir_referencia) }}</td>
                </tr>
            </table><br>
            <div style="page-break-after:always;"></div>
        @endforeach
        
        <span class="seccion"><strong>Datos generales</strong></span>
        <table class="tablaBody" border="1">
            <tr class="relleno">
                <th colspan="7">Como se enteró de la oferta de empleo</th>
            </tr>
            <tr>
                @if($datos->como_entero == 'internet')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">INTERNET</td>
                @else
                    <td width="11%" style="font-size: 10px;">INTERNET</td>
                @endif
        
                @if($datos->como_entero == 'publicidad')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">PUBLICIDAD</td>
                @else
                    <td width="11%" style="font-size: 10px;">PUBLICIDAD</td>
                @endif
        
                @if($datos->como_entero == 'perifoneo')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">PERIFONEO</td>
                @else
                    <td width="11%" style="font-size: 10px;">PERIFONEO</td>
                @endif
        
                @if($datos->como_entero == 'estatal_empleo')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">ESTATAL DE EMPLEO</td>
                @else
                    <td width="11%" style="font-size: 10px;">ESTATAL DE EMPLEO</td>
                @endif
        
                @if($datos->como_entero == 'periodico')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">PERIODICO</td>
                @else
                    <td width="11%" style="font-size: 10px;">PERIODICO</td>
                @endif
                @if($datos->como_entero  == 'contacto')
                    <td width="5%" style="background-color: lightgray; font-size: 10px;">CONTACTO</td>
                    <td width="30%">&nbsp;</td>
                @else
                    <td width="5%" style="font-size: 11px;">CONTACTO</td>
                    <td width="30%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                @if($datos->como_entero == 'redes_sociales')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">REDES SOCIALES</td>
                @else
                    <td width="11%" style="font-size: 10px;">REDES SOCIALES</td>
                @endif
        
                @if($datos->como_entero == 'lonas')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">LONAS</td>
                @else
                    <td width="11%" style="font-size: 10px;">LONAS</td>
                @endif
        
                @if($datos->como_entero == 'feria_empleo')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">FERIA DE EMPLEO</td>
                @else
                    <td width="11%" style="font-size: 10px;">FERIA DE EMPLEO</td>
                @endif
        
                @if($datos->como_entero == 'bolsa_trabajo')
                    <td width="11%" style="background-color: lightgray; font-size: 10px;">UNIVERSIDAD(BOLSA)</td>
                @else
                    <td width="11%" style="font-size: 10px;">UNIVERSIDAD(BOLSA)</td>
                @endif
        
                @if($datos->como_entero == 'volantes')
                    <td width="10%" style="background-color: lightgray; font-size: 10px;">VOLANTES</td>
                @else
                    <td width="11%" style="font-size: 10px; font-size: 10px;">VOLANTES</td>
                @endif
            
                @if($datos->como_entero == 'otros')
                    <td width="5%" style="background-color: lightgray; font-size: 11px;">OTROS</td>
                    <td width="30%">{{ strtoupper($datos->otros_entero) }}</td>
                @else
                    <td width="5%" style="font-size: 11px;">OTROS</td>
                    <td width="30%">&nbsp;</td>
                @endif
            </tr>
        </table>
        <table class="tablaBody" border="1">
            <tr>
                <th class="relleno" colspan="2">Esta en espera de alguna oferta laboral</th>
                @if($datos->espera_oferta_laboral == 'si')
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
                <th class="relleno" colspan="2">¿Tiene Parientes trabajando en esta empresa?</th>
                @if($datos->parientes == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">
                        {{ strtoupper($datos->parientes_nombre) }}
                    </td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">¿Ha estado afianzado?</th>
                @if($datos->afianzado == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">
                        {{ strtoupper($datos->nombre_cia) }}
                    </td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">¿Perteneció a un sindicato?</th>
                @if($datos->afianzado == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">
                        {{ strtoupper($datos->nombre_sindicato) }}
                    </td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">¿Tiene seguro de vida?</th>
                @if($datos->seguro == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">
                        {{ strtoupper($datos->nombre_seguro) }}
                    </td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">¿Puede Viajar?</th>
                @if($datos->viajar == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">&nbsp;</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">{{ strtoupper($datos->razones_viajar) }}</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">¿Está dispuesto a cambiar su lugar de residencia?</th>
                @if($datos->residencia == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <td width="50%">&nbsp;</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <td width="50%">{{ strtoupper($datos->razones_residencia) }}</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="2">Fecha en que podria presentarse a trabajar</th>
                @if($datos->fecha_trabjar != null)
                    <td colspan="3">{{ strtoupper($datos->fecha_trabjar) }}</td>
                @else
                    <td colspan="3">&nbsp;</td>
                @endif
            </tr>
        </table>
            
        <span class="seccion"><strong>Datos Económicos</strong></span>
        <table class="tablaBody" border="1">
            <tr>
                <th class="relleno" colspan="3">¿Tiene usted otros ingresos?</th>
                @if($datos->otro_ingreso == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">$ {{ strtoupper($datos->importe_mensual) }}</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <th width="5%">Importe</th>
                    <td width="50%" style="border-right: none; border-top: none; border-bottom: none;">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">Cuál</th>
                @if($datos->cual_ingreso != null)
                    <td colspan="4">{{ strtoupper($datos->cual_ingreso) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Su conyuge trabaja?</th>
                @if($datos->conyuge_trabaja == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%"> {{ strtoupper($datos->importe_conyuge) }} </td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Dónde? </th>
                @if($datos->conyuge_donde != null)
                    <td colspan="4">{{ strtoupper($datos->conyuge_donde) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Paga renta?</th>
                @if($datos->paga_renta == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">{{ strtoupper($datos->importe_renta) }}</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Vive en casa propia? </th>
                @if($datos->casa_propia != null)
                    <td colspan="4">{{ strtoupper($datos->casa_propia) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Tiene vehículo propio?</th>
                @if($datos->auto_propio == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <th width="5%" class="relleno">Marca: </th>
                    <td width="50%">{{ strtoupper($datos->marca) }}</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <th width="5%" class="relleno">Marca: </th>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">Modelo </th>
                @if($datos->modelo != null)
                    <td colspan="4">{{ strtoupper($datos->modelo) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Tiene deudas?</th>
                @if($datos->deudas == 'si')
                    <td width="5%" style="background-color: lightgray">SI</td>
                    <td width="5%">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">{{ strtoupper($datos->importe_deuda) }}</td>
                @else
                    <td width="5%">SI</td>
                    <td width="5%" style="background-color: lightgray">NO</td>
                    <th width="5%" class="relleno">Importe: </th>
                    <td width="50%">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Cuanto abona mensualmente? </th>
                @if($datos->abono_mensual != null)
                    <td colspan="4">{{ strtoupper($datos->abono_mensual) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
            <tr>
                <th class="relleno" colspan="3">¿Gastos mensuales? </th>
                @if($datos->gasto_mensual != null)
                    <td colspan="4">{{ strtoupper($datos->gasto_mensual) }}</td>
                @else
                    <td colspan="4">&nbsp;</td>
                @endif
            </tr>
        </table>
    
        <footer>
            <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Footer.png" id="blog-feature-image" width="100%" alt="encabezado"/>
        </footer>
    </body>
</html>
