<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelpers;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Renderiza el formulario de registro
     */
    public function form()
    {
        return view('auth.register');
    }

    /**
     * Realiza el registro
     */
    public function post(Request $request)
    {
        $request->validate([
            'nombre'           => ['required', 'string'],
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
            'email'            => ['required', 'email'],
            'password'         => ['required', 'confirmed', 'string']
        ]);

        Usuarios::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
            'password'         => bcrypt($request->password)
        ]);

        return redirect()->route('auth.login.form')
            ->with(AppHelpers::alert('Listo', 'Te has registrado correctamente, ahora ya puedes iniciar sesión'));
    }
}
