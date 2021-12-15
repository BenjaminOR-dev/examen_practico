<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelpers;
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

    public function ver_servicio($slug)
    {
        $servicio = Servicios::query()
            ->where('slug', $slug)
            ->first();

        if (!$servicio) {
            return redirect()->route('app.servicios')
                ->with(AppHelpers::alert('Error', 'No se encontró el servicio indicado', 'error'));
        }

        return view('app.servicio', compact('servicio'));
    }
}
