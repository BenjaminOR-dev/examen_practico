@extends('layouts.app')
@section('title', 'Tus servicios')

@section('content')
<h2>
    Tus servicios <a class="btn btn-primary" href="{{ route('dashboard.servicios.create') }}">Registrar nuevo</a>
</h2>
<hr>
<div class="my-3">
    <div class="row">
        @if ($servicios->isNotEmpty())
        @foreach ($servicios as $servicio)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset("/storage/servicios/{$servicio->imagen}") }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $servicio->titulo }}</h5>
                    <p class="card-text">{{ Str::limit($servicio->descripcion, 100, '...') }}</p>
                    <span class="font-italic">Precio: ${{ $servicio->precio }}</span>
                    <br>
                    <span class="font-italic text-success">{{ $servicio->created_at->diffForHumans() }}</span>
                    <br><br>
                    <a href="{{ route('dashboard.servicios.edit', ['servicio' => $servicio->id]) }}"
                        class="btn btn-primary">Editar</a>
                    <button class="btn btn-danger"
                        onclick="eliminarItem('{{ $servicio->id }}', '{{ $servicio->titulo }}')">Eliminar</button>
                    <form id="formDelete-{{ $servicio->id }}" class="invisible"
                        action="{{ route('dashboard.servicios.destroy', ['servicio' => $servicio->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
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
</div>
@endsection

@section('scripts')
<script>
    const eliminarItem = async (idItem, tituloItem) => {
        const formDelete = $('#formDelete-'+idItem);
        await Swal.fire({
            icon: 'warning',
            title: 'Atención',
            text: "Estás a punto de eliminar tu servicio: '" + tituloItem + "'",
            confirmButtonText: 'Aceptar',
            showCancelButton: true,
            cancelButtonText: 'Cancelar'
        }).then(async (res) => {
            if(res.isConfirmed){
                formDelete.submit();
            }
        });
    };
</script>
@endsection
