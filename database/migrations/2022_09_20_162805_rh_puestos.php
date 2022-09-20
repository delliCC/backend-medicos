<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_puestos', function (Blueprint $table) {
            $table->id();
            $table->string('puesto');
            $table->text('funcion');
            $table->boolean('status')->default(true);
            $table->timestamps();

            rh_puestos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_puestos');
    }
}
