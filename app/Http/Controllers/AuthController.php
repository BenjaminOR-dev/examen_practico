<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Renderiza la vista del formulario de inicio de sesión
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Realiza el inicio de sesión
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'user'     => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean']
        ]);

        $user = Usuarios::query()
            ->where('email', $request->user)
            ->first();

        if (!$user) {
            $validation = ['user' => 'El usuario ingresado no se encuentra en nuestros registros'];
        } elseif (!password_verify($request->password, $user->password)) {
            $validation = ['password' => 'La contraseña es incorrecta'];
        }

        if (isset($validation)) {
            throw ValidationException::withMessages($validation);
        }

        auth()->login($user, $request->remember == true ? true : false);

        return redirect()->route('app.inicio');
    }

    /**
     * Realiza el cierre se sesión
     */
    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
        }

        return redirect()->route('auth.login.form');
    }
}
