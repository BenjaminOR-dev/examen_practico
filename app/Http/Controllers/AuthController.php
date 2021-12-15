<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Realiza la autenticación del usuario
     */
    public function login(Request $request)
    {
        $request->validate([
            'user'     => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean']
        ]);

        $user = Usuarios::query()
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            $validation = ['email' => 'El email ingresado no se encuentra en nuestros registros'];
        }

        if (!password_verify($request->password, $user->password)) {
            $validation = ['password' => 'La contraseña es incorrecta'];
        }

        if (isset($validation)) {
            throw ValidationException::withMessages($validation);
        }

        auth()->login($user, $request->remember == true ? true : false);

        return redirect()->route('app.inicio');
    }
}
