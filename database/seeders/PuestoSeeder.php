<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reclutamiento\Puestos;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $puesto = Puestos::create([
            'puesto' => 'Auxiliar de sucursal',
        ]);
    }
}
