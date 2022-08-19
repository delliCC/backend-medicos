<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Studies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->unsignedBigInteger('metodo_id')->nullable();
            $table->unsignedBigInteger('muestra_id')->nullable();
            $table->string('informacion_clinica');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('metodo_id')->references('id')->on('type_method');
            $table->foreign('muestra_id')->references('id')->on('type_sample');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
