<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('correo');
            $table->string('telefono');
            $table->text('direccion');
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('prefijo');
            $table->string('hospital_trabajo')->nullable();
            $table->enum('tipo_medico',['General','Especialista'])->default('General');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('especialidad_id')->nullable();
            $table->timestamps();
            $table->foreign('especialidad_id')->references('id')->on('cat_especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
