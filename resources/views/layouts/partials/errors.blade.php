 
@if(session()->has('error'))
<script>
        swal({
          position: 'center',
          type: 'error',
          title: "{{session()->get('error')}}",
          showConfirmButton: false,
          timer: 1500
        });
</script>

@endif