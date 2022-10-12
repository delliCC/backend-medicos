<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PuestoSeeder;
use Database\Seeders\EmployeesSeeder;
use Database\Seeders\UserEmployeesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MedicoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(UserEmployeesSeeder::class);
        $this->call(PuestoSeeder::class);
    }
}
