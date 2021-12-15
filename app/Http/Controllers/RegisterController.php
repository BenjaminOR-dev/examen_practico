<?php

namespace App\Http\Controllers;

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
        //
    }
}
