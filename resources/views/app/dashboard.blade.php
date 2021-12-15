@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h2>Dashboard</h2>
<hr>
<div class="my-3" style="max-width: 500px;">
    <p class="mb-3">
        Hola {{ auth()->user()->nombre }} aquí podrás gestionar tu cuenta de {{ config('app.name') }}:
        <br><br>
        <a class="btn btn-primary" href="{{ route('dashboard.servicios.index') }}">
            Administrar mis servicios
        </a>
    </p>
</div>
@endsection
