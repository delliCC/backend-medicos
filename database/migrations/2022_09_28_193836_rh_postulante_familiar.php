<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPostulanteFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_postulante_familiar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulante_id');
            $table->string('nombre_referencia');
            $table->string('ocupacion_referencia');
            $table->enum('parentesco',['abuelo','abuela','mama','papa','conyuge','hijo','hija','hermano','hermana']);
            $table->string('edad_referencia');
            $table->string('telefono_referencia');
            $table->string('domicilio_referencia');
            $table->enum('vive',['si','no']);
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
        Schema::dropIfExists('rh_postulante_familiar');
    }
}
