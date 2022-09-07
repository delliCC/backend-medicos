<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medico = Medico::create([
            'nombre' => 'Nirandelli',
            'apellido_paterno' => 'Patricio',
            'apellido_materno' => 'Mayo',
            'correo' => 'npatricio@laboratorioschontalpa.com.mx',
            'telefono' => '9932065554',
            'direccion' => 'Guineo primera',
            'pais' => 'Mexico',
            'estado' => 'Tabasco',
            'municipio' => 'Centro',
            'prefijo' => 'MTI',
            'hospital_trabajo' => 'Laboratorio Chontalpa',
            'tipo_medico' => 'General',
            'empleado' => 'si'
        ]);
    }
}
