

@if(Session::has('status'))
    <script>
        toastr.info('{{Session::get('status')}}')
    </script>
@endif