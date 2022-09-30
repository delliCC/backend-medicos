<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhSeleccionados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_seleccionados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacante_id');
            $table->unsignedBigInteger('postulante_id');
            $table->enum('estado_postulante',['postulante','seleccionado','cartera'])->default('postulante');
            $table->boolean('status')->default(true);
            $table->timestamps();
            
            $table->foreign('vacante_id')->references('id')->on('rh_vacant');
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
        Schema::dropIfExists('rh_seleccionados');
    }
}
