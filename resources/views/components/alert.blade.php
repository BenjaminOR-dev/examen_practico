@if(session('alert') XOR isset($alert))
<script>
    $(window).on('load', function(){
            const $alert = {!! json_encode(session('alert') ?? $alert) !!};
            Swal.fire({
              icon: $alert.icono,
              title: $alert.titulo,
              text: $alert.mensaje,
              confirmButtonText: 'Aceptar'
            });
        });
</script>
@endif
