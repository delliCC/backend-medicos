<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicoTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_training', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('training_id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->enum('status',['pendiente','proceso','finalizado'])->default('pendiente');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('training_id')->references('id')->on('training');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico_training');
    }
}
