@if(session()->has('errors'))
<script>
        swal({
          position: 'center',
          type: 'error',
          title: {{session()->get('errors')->first()}},
          showConfirmButton: false,
          timer: 1500
        });
</script>

@endif