@extends('layouts.app')
@section('title', 'Nuevo servicio')

@section('content')
<h2>
    Publica un servicio <a class="btn btn-danger" href="{{ route('dashboard.servicios.index') }}">Cancelar</a>
</h2>
<hr>
<div class="my-3" style="max-width: 600px;">
    <form action="{{ route('dashboard.servicios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-3">
            <label for="imagen" class="form-label">Selecciona una imagen: *</label>
            <input id="imagen" name="imagen" type="file" class="form-control" accept=".jpg,.png,.jpeg" required>
            @error('imagen')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="titulo">Titulo: *</label>
            <input id="titulo" name="titulo" type="text" class="form-control"
                placeholder="Ejemplo: Almacenamiento en la nube" value="{{ old('titulo') }}" required>
            @error('titulo')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="descripcion">Descripción: *</label>
            <textarea id="descripcion" name="descripcion" class="form-control"  rows="2" placeholder="Ingresa una breve descripción" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="precio">Precio: *</label>
            <input id="precio" name="precio" type="number" class="form-control" style="max-width: 200px;" placeholder="$0.00" step=".10" min="0.1" value="{{ old('precio') }}" required>
        </div>
        <div class="text-end">
            <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </div>
    </form>
</div>
@endsection
