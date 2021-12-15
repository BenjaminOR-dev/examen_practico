@extends('layouts.app')
@section('title', 'Servicio')

@section('content')
<h2>Servicios</h2>
<hr>
<div class="my-5" style="margin-left: 50px;">
    <div class="row">
        <div class="col">
            <img src="{{ asset("/storage/servicios/{$servicio->imagen}") }}" style="max-height: 200px;" class="mb-3">
            <h5 class="card-title">{{ $servicio->titulo }}</h5>
            <p class="card-text">{{ $servicio->descripcion }}</p>
            <span class="font-italic">Precio: ${{ $servicio->precio }}</span><br>
            <span class="font-italic text-success">{{ $servicio->created_at->diffForHumans() }}</span><br>
            <span class="font-italic text-primary">{{ $servicio->autor->nombre_completo }}</span>
        </div>
        <div class="col">
            @guest
            <h3>Para enviar mensajes primero debes iniciar sesión</h3>
            <hr>
            <div class="container">
                ¿No tienes una cuenta? <a class="btn btn-link" href="{{ route('auth.register.form') }}">haz clic aquí
                    para crear una</a>
            </div>
            @else
            <h3>Enviale un mensaje</h3>
            <hr>
            <div class="container">
                <div class="messages">
                    @foreach ($servicio->mensajes as $mensaje)
                    <div class="message">
                        {{ $mensaje->autor->nombre }}: {{ $mensaje->texto }}<br>
                        @if ($mensaje->archivo_adjunto)
                        <a class="btn btn-link" href="{{ asset(" /storage/mensajes/{$mensaje->archivo_adjunto}") }}"
                            download="{{ config('app.name') . '_' . $mensaje->archivo_adjunto }}">
                            Descargar archivo adjunto
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
                <form action="{{ route('app.guardar-mensaje') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input id="id_servicio" name="id_servicio" type="hidden" value="{{ $servicio->id }}">
                    <div class="my-3">
                        <input id="texto" name="texto" type="text" class="form-control" placeholder="Escribe algo..."
                            required>
                    </div>
                    <div class="my-3">
                        <label for="archivo_adjunto" class="form-label">Añade un archivo adjunto: </label>
                        <input id="archivo_adjunto" name="archivo_adjunto" type="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection
