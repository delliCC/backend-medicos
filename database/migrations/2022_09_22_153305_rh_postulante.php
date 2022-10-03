<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RhPostulante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_postulante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacante_id');
            $table->date('fecha_postulacion');
            $table->string('sueldo_pretendido');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->enum('sexo',['femenino','masculino']);
            $table->integer('edad');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->string('curp');
            $table->string('rfc');
            $table->string('numero_social');
            $table->enum('licencia_conducir',['si','no']);
            $table->string('cartilla')->nullable();
            $table->string('correo');
            $table->string('telefono');
            $table->enum('estado_civil',['soltero','casado']);
            $table->enum('vive_con',['padres','familia','parientes','solo']);

            $table->text('direccion');
            $table->string('numero_casa');
            $table->string('entre_calles');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('municipio');
            $table->string('codigo_postal');

            $table->string('ultimo_grado_estudios');
            $table->string('institucion');
            $table->string('especialidad');
            $table->enum('certificado',['si','no'])->default('no');
            $table->enum('titulo',['si','no'])->default('no');
            $table->enum('cedula',['si','no'])->default('no')->nullable();
            $table->enum('trunco',['si','no'])->default('no')->nullable();
            $table->enum('estudia_actualmente',['si','no'])->default('no');
            $table->string('institucion_actual')->nullable();
            $table->string('carrera_actual')->nullable();
            $table->string('semestre_actual')->nullable();
            $table->string('horario_actual')->nullable();

            $table->string('idiomas');
            $table->text('maquina_software');
            $table->text('oficios_domines');
            $table->text('datos_manejo');

            $table->enum('como_entero',['internet','publicidad','perifoneo','estatal_empleo','periodico','redes_sociales','lonas','feria_empleo','universidad','volantes','contacto','otros']);
            $table->string('otros_entero')->nullable();
            $table->enum('parientes',['si','no'])->default('no');
            $table->string('parientes_nombre')->nullable();
            $table->enum('afianzado',['si','no'])->default('no');
            $table->string('nombre_cia')->nullable();
            $table->enum('sindicato',['si','no'])->default('no');
            $table->string('nombre_sindicato')->nullable();
            $table->enum('seguro',['si','no'])->default('no');
            $table->string('nombre_seguro')->nullable();
            $table->enum('viajar',['si','no'])->default('no');
            $table->string('razones_viajar')->nullable();
            $table->enum('residencia',['si','no'])->default('no');
            $table->text('razones_residencia')->nullable();
            $table->enum('espera_oferta_laboral',['si','no'])->default('no');
            $table->string('fecha_trabajar');

            $table->enum('otro_ingreso',['si','no'])->default('no');
            $table->string('importe_mensual')->nullable();
            $table->text('cual_ingreso')->nullable();
            $table->enum('conyuge_trabaja',['si','no'])->default('no');
            $table->string('importe_conyuge')->nullable();
            $table->string('conyuge_donde')->nullable();
            $table->enum('paga_renta',['si','no'])->default('no');
            $table->string('importe_renta')->nullable();
            $table->enum('casa_propia',['si','no'])->default('no')->nullable();
            $table->enum('auto_propio',['si','no'])->default('no');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->enum('deudas',['si','no'])->default('no');
            $table->string('importe_deuda')->nullable();
            $table->string('abono_mensual')->nullable();

            $table->enum('estado_postulante',['postulante','seleccionado','cartera'])->default('postulante');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('vacante_id')->references('id')->on('rh_vacant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh_postulante');
    }
}
