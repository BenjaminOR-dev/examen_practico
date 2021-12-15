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
        @auth
        <div class="col">
            <h3>Enviale un mensaje</h3>
            <hr>
        </div>
        @endauth
    </div>
</div>
@endsection
