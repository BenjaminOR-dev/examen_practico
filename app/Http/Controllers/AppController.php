<?php

namespace App\Http\Controllers;

use App\Models\Mensajes;
use App\Models\Servicios;
use App\Helpers\AppHelpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AppController extends Controller
{
    /**
     * Renderiza la vista de inicio
     */
    public function inicio()
    {
        return view('app.inicio');
    }

    /**
     * Renderiza la vista de servicios
     */
    public function servicios()
    {
        $servicios = Servicios::query()
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        return view('app.servicios', compact('servicios'));
    }

    /**
     * Renderiza la vista de ver servicio
     */
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

    /**
     * Guarda el mensaje de una publicación
     */
    public function guardarMensaje(Request $request)
    {
        $request->validate([
            'id_servicio'     => ['required', 'numeric', 'exists:servicios,id'],
            'texto'           => ['required', 'string', 'max:100'],
            'archivo_adjunto' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,mp3,aac', 'max:10000']
        ]);

        $mensaje = Mensajes::create([
            'id_autor'    => auth()->id(),
            'id_servicio' => $request->id_servicio,
            'texto'       => $request->texto
        ]);

        if($request->file('archivo_adjunto')){
            $nombre_archivo = $this->saveFile($request->file('archivo_adjunto'));
            $mensaje->update(['archivo_adjunto' => $nombre_archivo]);
        }

        return back();
    }

    /**
     * Guarda un archivo en el servidor y retorna
     * el nombre con el que fue guardado
     */
    private function saveFile($file)
    {
        $filename = Str::Slug(config('app.name'), '-') . "_" . rand() . "_" . $file->getClientOriginalName();
        Storage::disk('servicios')->put($filename, File::get($file));
        return $filename;
    }
}
