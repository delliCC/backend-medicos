<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPostulantFamily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_postulant_family', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulante_id');
            $table->string('nombre');
            $table->string('ocupacion');
            $table->enum('parentesco',['abuelo','abuela','mama','papa','conyuge','hijo','hija','hermano','hermana']);
            $table->string('edad');
            $table->string('telefono');
            $table->string('domicilio');
            $table->enum('vive',['si','no']);
            $table->enum('depende',['si','no']);
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
        Schema::dropIfExists('rh_postulant_family');
    }
}
