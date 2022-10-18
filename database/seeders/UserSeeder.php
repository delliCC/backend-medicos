<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'medico_id'=>1,
            'name' => 'Nirandelli Patricio Mayo',
            'username' => 'delli.patricio',
            'email' => 'npatricio@laboratorioschontalpa.com.mx',
            'password' => bcrypt('secret')
        ])->assignRole('Admin');
    }
}
