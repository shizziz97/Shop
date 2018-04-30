@if(session()->has('success'))
<script>swal("Good job!", "{{ session()->get('success') }}", "success");
</script>
@endif
