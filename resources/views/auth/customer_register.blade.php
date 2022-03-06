<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>Miracle</title>
    <link rel="stylesheet" href="{{asset('/resources/css/signup.css')}}" id="bscss">
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
    <div class="wrapper">
        <!-- <div class="logo"> -->
            <!-- <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> -->
        <!-- </div> -->
        <div class="name"> Miracle </div>
        <form  action="{{url('customer/register/submit')}}" method="POST">
            @csrf
            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="text" name="name" id="exampleInputName" value="{{ old('name') }}" placeholder="Name" required>
            </div>
                @if ($errors->has('name'))
                    <span class="span-error">!{{ $errors->first('name') }}!</span>
                @endif

            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="email" name="email" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
            </div>
                @if ($errors->has('email'))
                    <span class="span-error">!{{ $errors->first('email') }}!</span>
                @endif

            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="phone" name="phone" id="exampleInputPhone" value="{{ old('phone') }}" placeholder="Phone" required>
            </div>
                @if ($errors->has('phone'))
                    <span class="span-error">!{{ $errors->first('phone') }}!</span>
                @endif
            
            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="password" name="password" id="exampleInputPassword" placeholder="Password" required autofocus>
            </div>
                @if ($errors->has('password'))
                    <span class="span-error">!{{ $errors->first('password') }}!</span>
                @endif
            
            <div class="form-field d-flex align-items-center">
                <!-- <span class="far fa-user"></span>  -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
                @if ($errors->has('password_confirmation'))
                    <span class="span-error">!{{ $errors->first('password_confirmation') }}!</span>
                @endif
    
            @if(session()->has('error'))
                <div class="span-error">
                    {{ session()->get('error') }}
                </div>
            @endif
            <button class="btn btn-sm" type="submit">- Sign up -</button>
            <div class="register">
                <p>Already have account? <a href="{{route('customer.login')}}">login here.</a></p>
                <a href="{{route('home')}}">Back to home</a><br>
            </div>
        </form>
    </div>        
</body>
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