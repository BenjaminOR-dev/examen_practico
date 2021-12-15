@extends('layouts.app')
@section('title', 'Tus servicios')

@section('content')
<h2>
    Tus servicios publicados <a class="btn btn-primary" href="{{ route('dashboard.servicios.create') }}">Registrar
        nuevo</a>
</h2>
<hr>
<div class="my-3">
    @if ($servicios->isNotEmpty())
    @foreach ($servicios as $servicio)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset("storage/servicios/{$servicio->imagen}") }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $servicio->titulo }}</h5>
            <p class="card-text">{{ Str::limit($servicio->descripcion, 255, '...') }}</p>
            <span class="font-italic">Precio: ${{ $servicio->precio }}</span>
            <br>
            <span class="font-italic text-success">{{ $servicio->created_at->diffForHumans() }}</span>
            <br><br>
            <a href="{{ route('dashboard.servicios.edit', ['servicio' => $servicio->id]) }}"
                class="btn btn-primary">Editar</a>
            <button class="btn btn-danger">Eliminar</button>
        </div>
    </div>
    @endforeach
    <div class="my-3">
        {{ $servicios->links() }}
    </div>
    @else
    <p class="text-center">
        Vaya, al parecer aun no tienes publicaciones
    </p>
    @endif
</div>
@endsection
