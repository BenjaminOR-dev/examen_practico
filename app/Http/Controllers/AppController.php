<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function inicio()
    {
        return view('app.inicio');
    }
}
