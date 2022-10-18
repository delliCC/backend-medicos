<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Admin']);
        $roleMedico = Role::create(['name'=>'Medico']);
        $roleInvitado = Role::create(['name'=>'Invitado']);
        $roleReclutamiento =Role::create(['name'=>'Reclutamiento']);

        Permission::create(['name'=>'home'])->syncRoles([$roleAdmin,$roleReclutamiento]);;
        Permission::create(['name'=>'medicos.index']);
        
    }
}
