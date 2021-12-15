<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuarios::truncate();

        Usuarios::insert([
            [
                'id_rol'           => 1,
                'nombre'           => 'Roberto',
                'apellido_paterno' => 'Darío',
                'apellido_materno' => 'Hernández',
                'email'            => 'roberto@empresavirtual.mx',
                'password'         => bcrypt('password')
            ],
            [
                'id_rol'           => 2,
                'nombre'           => 'Carlos',
                'apellido_paterno' => 'González',
                'apellido_materno' => 'Estrada',
                'email'            => 'carlos@gmail.com',
                'password'         => bcrypt('password')
            ]
        ]);
    }
}
