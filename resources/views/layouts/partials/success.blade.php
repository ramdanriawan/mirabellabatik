@if(session()->has('success'))
<script>
        swal({
          position: 'center',
          type: 'success',
          title: "{{session()->get('success')}}",
          showConfirmButton: false,
          timer: 1500
        });
</script>

@endif