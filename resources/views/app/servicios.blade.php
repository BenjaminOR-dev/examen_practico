@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<h2>Servicios</h2>
<hr>
<div class="my-3">
    @if ($servicios->isNotEmpty())
    @foreach ($servicios as $servicio)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset("/storage/servicios/{$servicio->imagen}") }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $servicio->titulo }}</h5>
            <p class="card-text">{{ Str::limit($servicio->descripcion, 255, '...') }}</p>
            <span class="font-italic">Precio: ${{ $servicio->precio }}</span><br>
            <span class="font-italic text-success">{{ $servicio->created_at->diffForHumans() }}</span><br>
            <span class="font-italic text-primary">{{ $servicio->autor->nombre_completo }}</span><br><br>
            <a href="{{ route('app.ver-servicio', ['slug' => $servicio->slug]) }}"
                class="btn btn-primary">Ver más</a>
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
