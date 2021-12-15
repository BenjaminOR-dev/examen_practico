@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<h2>Bienvenido @auth {{ auth()->user()->nombre_completo }} @endauth</h2>
<hr>
<div class="my-3">

</div>
@endsection
