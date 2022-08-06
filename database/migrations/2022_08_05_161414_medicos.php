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
        // Schema::create('medicos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nombre');
        //     $table->string('apaterno');
        //     $table->string('amaterno');
        //     $table->string('email');
        //     $table->string('celular');
        //     $table->text('direccion');
        //     $table->string('pais');
        //     $table->string('estado')->unsigned();
        //     $table->string('municipio')->unsigned();
        //     $table->string('prefijo');
        //     $table->string('hospital_trabajo')->null();
        //     $table->enum('tipo_medico',['General','Especialista'])->default('general');
        //     $table->integer('especialidad_id')->null()->unsigned();
        //     $table->boolean('status')->default(true);
        //     $table->timestamps();

        //     $table->foreign('especialidad_id')->references('id')->on('cat_especialidades');
        // });

        // Schema::table('medicos', function (Blueprint $table) {
        //     $table->foreign('especialidad_id')->references('id')->on('cat_especialidades');
        // });
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
