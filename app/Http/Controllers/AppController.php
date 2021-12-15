<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function inicio()
    {
        return view('app.inicio');
    }

    public function servicios()
    {
        $servicios = Servicios::query()
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        return view('app.servicios', compact('servicios'));
    }

    public function dashboard()
    {

    }
}
