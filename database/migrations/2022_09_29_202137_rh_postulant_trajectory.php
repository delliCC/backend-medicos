<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPostulantTrajectory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_postulant_trajectory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulante_id');
            $table->string('empresa');
            $table->date('fecha_ingreso');
            $table->date('fecha_baja');
            $table->string('puesto');
            $table->string('sueldo_inicial');
            $table->string('sueldo_final');
            $table->enum('dias_cobro',['proyecto','mensual','quincenal','semanal','diario']);
            $table->enum('pedir_referencia',['si','no']);
            $table->enum('select_carta',['si','no']);
            $table->enum('select_constancia',['si','no']);
            $table->enum('motivo_salida',['renuncia','termino_contrato','renudacion_estudios','horarios','salario','problemas_salud','otros']);
            $table->text('otro_motivo_salida')->nullable();
            $table->text('domicilio_empresa');
            $table->string('jefe');
            $table->string('puesto_jefe');
            $table->string('telefono_jefe');
            $table->timestamps();
            
            $table->foreign('postulante_id')->references('id')->on('rh_postulante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_postulant_trajectory');
    }
}
