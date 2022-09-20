<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Reclutamiento\Employees;

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
            'numero_empleado_id'=> '1270',
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
