<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado = Employees::create([
            'nombre' => 'Martin',
            'apellido_paterno' => 'Santibanez',
            'apellido_materno' => 'Cruz y Corro',
            'correo' => 'msantibanez@laboratorioschontalpa.com.mx',
            'telefono' => '9932065554',
            'direccion' => 'Cedros',
            'pais' => 'Mexico',
            'estado' => 'Tabasco',
            'municipio' => 'Centro'
        ]);
    }
}
