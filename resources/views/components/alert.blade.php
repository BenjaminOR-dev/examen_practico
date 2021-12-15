@if(session('alert') XOR isset($alert))
<script>
    $(window).on('load', function(){
        const alert = {!! json_encode(session('alert') ?? $alert) !!};
        Swal.fire({
          icon: alert.type,
          title: alert.title,
          text: alert.text,
          confirmButtonText: 'Aceptar'
        });
    });
</script>
@endif
