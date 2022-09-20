<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('sucursal');
            $table->string('correo');
            $table->string('telefono');
            $table->text('direccion');
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_sucursales');
    }
}
