<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Webinar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('webinar_url');
            $table->text('descripcion');
            $table->string('ficha_nombre');
            $table->string('ficha_url');
            $table->text('ficha_descripcion');
            $table->dateTime('fecha_inicio');
            $table->text('preview_imagen');
            $table->text('trailer_url');
            $table->text('nombre_medico');
            $table->string('imagen_medico_url');
            $table->text('especialidad');
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
        Schema::dropIfExists('webinar');
    }
}
