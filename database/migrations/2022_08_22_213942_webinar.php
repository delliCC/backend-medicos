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
            $table->string('url');
            $table->text('descripcion');
            $table->text('nombre_medico');
            $table->string('imagen_url');
            $table->text('especialidad');
            $table->dateTime('fecha_inicio');
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
