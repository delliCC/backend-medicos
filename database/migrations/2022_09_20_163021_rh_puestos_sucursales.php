<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPuestosSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_puestos_sucursales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('puesto_id');
            $table->boolean('status')->default(true);
            $table->timestamps();
            
            $table->foreign('puesto_id')->references('id')->on('rh_puestos');
            $table->foreign('sucursal_id')->references('id')->on('rh_sucursales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_puestos_sucursales');
    }
}
