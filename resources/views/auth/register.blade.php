@extends('layouts.app')
@section('title', 'Registrate')

@section('content')
<h2>Registrate</h2>
<hr>
<div class="my-3">
    <form action="{{ route('auth.register.post') }}" method="POST" style="max-width: 800px;">
        @csrf
        <div class="row">
            <div class="my-3 col">
                <label for="nombre">Nombre(s): *</label>
                <input id="nombre" name="nombre" type="text" class="form-control" value="{{ old('nombre') }}"
                    placeholder="Ejemplo: Benjamín" required>
                @error('nombre')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="my-3 col">
                <label for="apellido_paterno">Apellido Paterno: *</label>
                <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control"
                    value="{{ old('apellido_paterno') }}" placeholder="Ejemplo: Olvera" required>
                @error('apellido_paterno')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="my-3 col">
                <label for="apellido_materno">Apellido Materno: *</label>
                <input id="apellido_materno" name="apellido_materno" type="text" class="form-control"
                    value="{{ old('apellido_materno') }}" placeholder="Ejemplo: Rosales" required>
                @error('apellido_materno')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="my-3 col">
                <label for="email">Correo electrónico: *</label>
                <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}"
                    placeholder="Ejemplo: correo@gmail.com" required>
                @error('email')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="my-3 col">
                <label for="password">Contraseña: *</label>
                <input id="password" name="password" type="password" class="form-control" value="{{ old('password') }}"
                    placeholder="******" required>
                @error('password')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="my-3 col">
                <label for="password_confirmation">Confirmar contraseña: *</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                    value="{{ old('password_confirmation') }}" placeholder="******" required>
                @error('password_confirmation')<span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="text-end">
            <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Registrarme</button>
        </div>
    </form>
</div>
@endsection
