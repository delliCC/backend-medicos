<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicoWebinar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_webinar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('webinar_id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->enum('status',['pendiente','proceso','finalizado'])->default('pendiente');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('webinar_id')->references('id')->on('webinar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico_webinar');
    }
}
