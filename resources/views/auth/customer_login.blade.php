
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>Miracle's customer login</title>
    <link rel="stylesheet" href="{{asset('/resources/css/login.css')}}" id="bscss">
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.css')}}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <!-- toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
</head>

<body>
    <!-- <div class="background"> -->
        <!-- <div class="shape"></div>
        <div class="shape"></div> -->
    <!-- </div> -->
    @include('includes.alert')
    <div class="wrapper">
        <!-- <div class="logo">  -->
            <!-- <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> -->
        <!-- </div> -->
        <div class="name"> Sign in to Miracle </div>
        <form  action="{{url('/customer/login')}}" method="POST" class="p-3 mt-3">
            @csrf
            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="email" name="email" id="exampleInputEmail1" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <!-- <span class="fas fa-key"></span>  -->
                <input type="password" name="password" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button class="btn" type="submit">Login</button>
            <div class="register">
                <a href="{{route('home')}}">Back to home</a><br>
                <a href="#">Forget password?</a> or <a href="{{route('customer.register')}}">Sign up</a>
            </div>

            <!-- <p class="text-center py-2">SIGN IN TO CONTINUE.</p>
            <label for="username">Username</label>
            <input name="email" id="exampleInputEmail1" type="email" placeholder="Email or Phone" required>
            
            <label for="password">Password</label>
            <input name="password" id="exampleInputPassword1" type="password" placeholder="Password"  required> -->
            
            @if(session()->has('danger'))
                <p class="alert alert-danger" style="color:tomato;margin-top:5px;">{{session('danger')}}</p>
            @endif
        </form>
    </div>

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
<!-- toastr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script>
<!-- =============== APP SCRIPTS ===============-->
<script src="{{asset('admin/js/app.js')}}"></script>
</body>

</html>