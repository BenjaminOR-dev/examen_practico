@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<h2>Bienvenido @auth {{ auth()->user()->nombre_completo }} @endauth</h2>
<hr>
<div class="my-3" style="max-width: 500px;">
    <p class="mb-3">
        Hola, este es un examen práctico elaborado por Benjamín Olvera Rosales,
        el cual consiste en una pequeña aplicación de mensajería entre usuarios,
        la cual se encuentra en cada publicación de servicios.
        <br><br>
        @auth
        <a class="btn btn-primary" href="{{ route('dashboard.inicio') }}">
            Ir a mi dashboard
        </a>
        @endauth
        <a class="btn btn-secondary" href="{{ route('app.servicios') }}">
            Ver los servicios
        </a>
    </p>
</div>
@endsection
