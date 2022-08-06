<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Coupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('coupons', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('medico_id')->unsigned();
        //     $table->string('url');
        //     $table->string('imagen');
        //     $table->timestamps();

        //     $table->foreign('medico_id')->references('id')->on('medicos');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
