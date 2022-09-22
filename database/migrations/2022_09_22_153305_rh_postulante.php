<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPostulante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_postulante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacante_id');
            $table->date('fecha_postulacion');
            $table->string('sueldoPretendido');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('sexo');
            $table->bigInteger('edad');
            $table->string('lugarNacimiento');
            $table->string('fechaNacimiento');
            $table->string('curp');
            $table->string('rfc');
            $table->string('numero_social');
            $table->string('licencia_conducir');
            $table->string('cartilla');
            $table->string('correo');
            $table->bigInteger('phone');

            $table->text('calle');
            $table->string('numeroCasa');
            $table->string('entreCalles');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('municipio');
            $table->string('codigoPostal');
            
            $table->string('nombrePadre');
            $table->string('ocupacionPadre');
            $table->bigInteger('edadPadre');
            $table->string('phonePadre');
            $table->text('domicilioPadre');

            $table->string('nombreMadre');
            $table->string('ocupacionMadre');
            $table->bigInteger('edadMadre');
            $table->string('phoneMadre');
            $table->text('domicilioMadre');

            $table->string('nombreEsposo');
            $table->string('ocupacionEsposo');
            $table->bigInteger('edadEsposo');
            $table->string('phoneEsposo');
            $table->text('domicilioEsposo');

            // $table->string('ultimoGradoEstudios');
            // $table->string('institucion');
            // $table->string('especialidad');
            // $table->string('certificado');
            // $table->string('titulo');
            // $table->string('cedula');
            // $table->string('trunco');
            // $table->enum('estudias',['si','no'])->default('no');
            // $table->string('institucionActual');
            // $table->string('carrera');
            // $table->string('semestre');
            // $table->string('horario');

            // $table->string('idiomas');
            // $table->string('maquinaSoftware');
            // $table->string('oficiosDomines');
            // $table->text('domicilioConocimientos');

            // $table->string('nombreReferencia');
            // $table->string('ocupacionReferencia');
            // $table->bigInteger('edadReferencia');
            // $table->string('phoneReferencia');
            // $table->text('domicilioReferencia');

            // $table->string('nombreReferencia2');
            // $table->string('ocupacionReferencia2');
            // $table->bigInteger('edadReferencia2');
            // $table->string('phoneReferencia2');
            // $table->text('domicilioReferencia2');

            // $table->string('nombreReferencia3');
            // $table->string('ocupacionReferencia3');
            // $table->bigInteger('edadReferencia3');
            // $table->string('phoneReferencia3');
            // $table->text('domicilioReferencia3');

            // $table->string('empresaTrayectoLaboral');
            // $table->string('domicilioTrayectoLaboral');
            // $table->string('phoneTrayectoLaboral');
            // $table->string('giroComercial');
            // $table->date('fechaIngresoTrayectoLaboral');
            // $table->date('fechaBajaTrayectoLaboral');
            // $table->string('puestoInicial');
            // $table->string('sueldoInicial');
            // $table->string('ultimoPuesto');
            // $table->string('ultimoSueldo');
            // $table->string('nombreJefe');
            // $table->string('puestoJefe');
            // $table->text('motivoSalida');
            // $table->text('cual');

            // $table->string('empresaTrayectoLaboral2');
            // $table->string('domicilioTrayectoLaboral2');
            // $table->string('phoneTrayectoLaboral2');
            // $table->string('giroComercial2');
            // $table->date('fechaIngresoTrayectoLaboral2');
            // $table->date('fechaBajaTrayectoLaboral2');
            // $table->string('puestoInicial2');
            // $table->string('sueldoInicial2');
            // $table->string('ultimoPuesto2');
            // $table->string('ultimoSueldo2');
            // $table->string('nombreJefe2');
            // $table->string('puestoJefe2');
            // $table->text('motivoSalida2');
            // $table->string('cual2');

            // $table->string('empresaTrayectoLaboral3');
            // $table->string('domicilioTrayectoLaboral3');
            // $table->string('phoneTrayectoLaboral3');
            // $table->string('giroComercial3');
            // $table->date('fechaIngresoTrayectoLaboral3');
            // $table->date('fechaBajaTrayectoLaboral3');
            // $table->string('puestoInicial3');
            // $table->string('sueldoInicial3');
            // $table->string('ultimoPuesto3');
            // $table->string('ultimoSueldo3');
            // $table->string('nombreJefe3');
            // $table->string('puestoJefe3');
            // $table->text('motivoSalida3');
            // $table->text('cual3');

            $table->enum('estado_postulante',['postulante','seleccionado','cartera'])->default('postulante');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('vacante_id')->references('id')->on('rh_vacant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_postulante');
    }
}
