<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="#" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="miracle is one of the famous handmade collection in myanmar">
    <meta name="keywords" content="handmade brand">
    <meta name="author" content="ppz">

    <!-- google font -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital@1&display=swap" rel="stylesheet">

    <!-- icomon -->
    <link rel="stylesheet" href="{{asset('resources/icomoon/style.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

     <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}" id="bscss"> -->
    <link rel="stylesheet" href="{{asset('resources/css/homestyle.css')}}">

    <!-- Navbar template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- End Navbar template  -->

    <!-- toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <!-- product detail -->
     
    <!-- end product detail -->

    <title>Miracle</title>
</head>
<body>
    <!-- navigation bar and side menu -->
    @include('navbar')
    
    <div class="container account">
        <div class="row">
            <!-- sidemenu -->
            <div class="col-md-3 mb-3">
                <!-- <div class="header">User Dashboard</div> -->
                <div class="wrapper">
                    <div class="account-menu card" style="width: 16rem;">
                        <div class="account-header card-header">
                            <h5 class="mt-2">Dashboard</h5>
                        </div>
                        <ul class="account-list list-group list-group-flush">
                            <a href="{{route('account')}}"><li class="list-group-item">Cart</li></a>
                            <a href="{{route('cart.history')}}"><li class="list-group-item">Carts History </li></a>
                            <a href="{{route('wishlist')}}"><li class="list-group-item">Wishlist</li></a>
                            <a href="{{route('signout')}}"><li class="list-group-item">Logout</li></a>
                        </ul>
                    </div>
                </div>
            </div>
    
            <!-- Page content-->
            @yield('content')
        </div>
    </div>
    
    @include('footer')
</body>
</html>

@section('content')
@endsection