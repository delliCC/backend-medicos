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
            $table->enum('sexo',['femenino','masculino']);
            $table->integer('edad');
            $table->string('lugar_nacimiento');
            $table->string('fecha_nacimiento');
            $table->string('curp');
            $table->string('rfc');
            $table->string('numero_social');
            $table->string('licencia_conducir');
            $table->string('cartilla');
            $table->string('correo');
            $table->string('telefono');
            $table->enum('vive_con',['padres','familia','parientes','solo']);

            $table->text('direccion');
            $table->string('numero_casa');
            $table->string('entre_calles');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('municipio');
            $table->string('codigo_postal');

            $table->string('ultimo_grado_estudios');
            $table->string('institucion');
            $table->string('especialidad');
            $table->string('certificado');
            $table->enum('titulo',['si','no'])->default('no');
            $table->enum('cedula',['si','no'])->default('no');
            $table->enum('trunco',['si','no'])->default('no');
            $table->enum('estudia_actualmente',['si','no'])->default('no');
            $table->string('institucion_actual');
            $table->string('carrera_actual');
            $table->string('semestre_actual');
            $table->string('horario_actual');

            $table->string('idiomas');
            $table->text('maquina_software');
            $table->text('oficios_domines');
            $table->text('datos_manejo');

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
