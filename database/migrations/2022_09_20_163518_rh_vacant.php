<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhVacant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_vacant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->string('cantidad');
            $table->string('imagen_url');
            $table->text('requisitos');
            $table->text('funcion');
            $table->string('salario');
            $table->text('prestaciones');
            $table->string('horario');
            $table->unsignedBigInteger('reclutador_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('puesto_id')->references('id')->on('rh_puestos');
            $table->foreign('sucursal_id')->references('id')->on('rh_sucursales');
            $table->foreign('reclutador_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_vacant');
    }
}
