<?php

namespace App\Http\Controllers\Crud;

use App\Models\Servicios;
use App\Helpers\AppHelpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicios::query()
            ->where('id_autor', auth()->id())
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('app.cruds.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cruds.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen'      => ['required', 'mimes:png,jpg,jpeg', 'image','max:10000'],
            'titulo'      => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'precio'      => ['required', 'string']
        ]);

        $nombre_imagen = $this->saveFile($request->file('imagen'));
        Servicios::create([
            'id_autor'    => auth()->id(),
            'slug'        => Str::slug(($request->titulo . '-' . now()), '-'),
            'imagen'      => $nombre_imagen,
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio
        ]);

        return $this->returnIndex('Listo', 'Se ha publicado tu servicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$servicio = $this->searchItem($id)) {
            return $this->item404();
        }

        return view('app.cruds.servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$servicio = $this->searchItem($id)) {
            return $this->item404();
        }

        return view('app.cruds.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$servicio = $this->searchItem($id)) {
            return $this->item404();
        }

        $request->validate([
            'imagen'      => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:10000'],
            'titulo'      => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'precio'      => ['required', 'string']
        ]);

        if ($request->file('imagen')) {
            $nombre_imagen = $this->saveFile($request->file('imagen'));
            $this->deleteFile($servicio->imagen);
            $servicio->update(['imagen' => $nombre_imagen]);
        }

        $servicio->update([
            'slug'        => Str::slug(($request->titulo . '-' . now()), '-'),
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio
        ]);

        return $this->returnIndex('Listo', 'Se actualizó tu publicación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$servicio = $this->searchItem($id)) {
            return $this->item404();
        }

        $this->deleteFile($servicio->imagen);
        $servicio->delete();

        return $this->returnIndex('Listo', 'Se ha eliminado tu servicio');
    }

    /**
     * Retorna a la ruta index
     */
    private function returnIndex(String $title, String $text)
    {
        return redirect()->route('dashboard.servicios.index')
        ->with(AppHelpers::alert($title, $text));
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

    /**
     * Elimina un archivo del servidor
     */
    private function deleteFile($filename)
    {
        return Storage::disk('servicios')->delete($filename);
    }

    /**
     * Busca un item y lo retorna
     */
    private function searchItem($id)
    {
        $servicio = Servicios::query()
            ->where('id', $id)
            ->where('id_autor', auth()->id())
            ->first();

        return $servicio;
    }

    /**
     * Retorna a la ruta index con un error de item no encontrado
     */
    private function item404()
    {
        return redirect()->route('dashboard.servicios.index')
            ->with(AppHelpers::alert('Error', 'No se encontró el servicio indicado', 'error'));
    }
}
