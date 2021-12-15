<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        Roles::insert([
            [
                'id'     => 1,
                'nombre' => 'Administrador'
            ],
            [
                'id'     => 2,
                'nombre' => 'Cliente'
            ]
        ]);
    }
}
