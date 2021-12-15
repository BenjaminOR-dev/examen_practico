@extends('layouts.app')
@section('title', 'Inicia sesión')

@section('content')
<h2>Inicia Sesión</h2>
<hr>
<div class="my-3">
    <form action="{{ route('auth.login.post') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="my-3">
            <label for="user">Correo electrónico: *</label>
            <input id="user" name="user" type="text" class="form-control" placeholder="ejemplo@gmail.com" value="{{ old('user') }}" required>
            @error('user')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <label for="password">Contraseña: *</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="*******" value="{{ old('password') }}" required>
            @error('password')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="my-3">
            <input class="form-check-input" type="checkbox" value="true" id="remember">
            <label class="form-check-label" for="remember">
                Recordar sesión
            </label>
            @error('remember')<span class="text-danger font-italic">{{ $message }}</span>@enderror
        </div>
        <div class="text-end">
            <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Acceder</button>
        </div>
    </form>
</div>
@endsection
