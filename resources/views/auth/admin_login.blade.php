
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>Miracle's admin login</title>
    <link rel="stylesheet" href="{{asset('/resources/css/login.css')}}" id="bscss">
</head>

<body>
    <div class="background">
        <!-- <div class="shape"></div>
        <div class="shape"></div> -->
    </div>
    <form  action="{{url('/miracle77/login')}}" method="POST">
        @csrf
        <p class="text-center py-2">SIGN IN TO CONTINUE.</p>
        <label for="username">Username</label>
        <input name="email" id="exampleInputEmail1" type="email" placeholder="Email or Phone" required>
        
        <label for="password">Password</label>
        <input name="password" id="exampleInputPassword1" type="password" placeholder="Password"  required>
        
        @if(session()->has('danger'))
            <p class="alert alert-danger text-center" style="color:tomato;margin-top:5px;">{{session('danger')}}</p>
        @endif
        <button class="" type="submit">Log In</button>
    </form>

    <!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="{{asset('admin/vendor/modernizr/modernizr.custom.js')}}"></script>
<!-- JQUERY-->
<script src="{{asset('admin/vendor/jquery/dist/jquery.js')}}"></script>
<!-- BOOTSTRAP-->
<script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- STORAGE API-->
<script src="{{asset('admin/vendor/js-storage/js.storage.js')}}"></script>
<!-- PARSLEY-->
<script src="{{asset('admin/vendor/parsleyjs/dist/parsley.js')}}"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="{{asset('admin/js/app.js')}}"></script>
</body>

</html>