<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudiesSample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies_sample', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudio_id');
            $table->unsignedBigInteger('muestra_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('estudio_id')->references('id')->on('studies');
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
        Schema::dropIfExists('studies_sample');
    }
}
