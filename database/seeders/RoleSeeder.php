<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Medico']);
        Role::create(['name'=>'Invitado']);
        Role::create(['name'=>'Reclutamiento']);
    }
}
