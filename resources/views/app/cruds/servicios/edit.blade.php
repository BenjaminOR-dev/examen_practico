@extends('layouts.app')
@section('title', 'Editar servicio')

@section('content')
<h2>
    Edita tu servicio <a class="btn btn-danger" href="{{ route('dashboard.servicios.index') }}">Cancelar</a>
</h2>
<hr>
<div class="my-3" style="max-width: 600px;">
    <form action="{{ route('dashboard.servicios.update', ['servicio' => $servicio->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="my-3">
            <div class="my-3">
                <span>Imagen actual: </span><br>
                <img src="{{ asset("/storage/servicios/{$servicio->imagen}") }}" style="max-width: 250px">
            </div>
            <label for="imagen" class="form-label">Cambiar imagen:</label>
            <input id="imagen" name="imagen" type="file" class="form-control" accept=".jpg,.png,.jpeg">
            @error('imagen')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="titulo">Titulo: *</label>
            <input id="titulo" name="titulo" type="text" class="form-control"
                placeholder="Ejemplo: Almacenamiento en la nube" value="{{ old('titulo', $servicio->titulo) }}" required>
            @error('titulo')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="descripcion">Descripción: *</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="2"
                placeholder="Ingresa una breve descripción" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
            @error('descripcion')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="precio">Precio: *</label>
            <input id="precio" name="precio" type="number" class="form-control" style="max-width: 200px;"
                placeholder="$0.00" step=".10" min="0.1" value="{{ old('precio', $servicio->precio) }}" required>
        </div>
        <div class="text-end">
            <button type="reset" class="btn btn-outline-secondary">Reestablecer</button>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </div>
    </form>
</div>
@endsection
