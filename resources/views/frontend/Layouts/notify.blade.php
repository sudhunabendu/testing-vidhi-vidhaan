@if(session('success'))
<script>
Swal.fire({
    title: "Success!",
    text: "{{session('success')}}",
    icon: "success",
    showConfirmButton: false,
    timer: 2500
  });
</script>


@elseif(session('error'))
<script>
    Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "{{session('error')}}",
    showConfirmButton: false,
    timer: 2500
});
</script>

@endif