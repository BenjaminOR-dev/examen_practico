@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<h2>Servicios</h2>
<hr>
<div class="my-3">
    @if ($servicios->isNotEmpty())
    @foreach ($servicios as $servicio)
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $servicio->titulo }}</h5>
            <p class="card-text">{{ $servicio->descripcion }}</p>
            <span class="font-italic">${{ $servicio->precio }}</span>
            <a href="{{ route('dashboard.servicios.edit', ['servicio' => $servicio->id]) }}"
                class="btn btn-primary">Editar</a>
            <a href="{{ route('dashboard.servicios.destroy', ['servicio' => $servicio->id]) }}"
                class="btn btn-danger">Eliminar</a>
        </div>
    </div>
    @endforeach
    @else
    <p class="text-center">
        Vaya, al parecer nadie a publicado servicios
    </p>
    @endif
</div>
@endsection
