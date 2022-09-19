<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'empleado_id'=>1,
            'name' => 'Martin Santibanez Cruz y Corro',
            'username' => 'martin.santibanez',
            'email' => 'msantibanez@laboratorioschontalpa.com.mx',
            'password' => bcrypt('secret')
        ]);
    }
}
