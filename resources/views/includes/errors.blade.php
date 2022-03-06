
@if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
@endif

@if(session()->has('status'))
    <p class="alert alert-success text-center text-black">{{session('status')}}</p>
@endif

@if(session()->has('info'))
    <p class="alert alert-info text-center text-black">{{session('info')}}</p>
@endif
@if(session()->has('success'))
    <p class="alert alert-success text-center text-black">{{session('success')}}</p>
@endif

@if(session()->has('danger'))
    <p class="alert alert-danger text-center">{{session('danger')}}</p>
@endif