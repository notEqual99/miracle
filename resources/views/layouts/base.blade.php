<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="#" rel="shortcut icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="miracle is one of the famous handmade collection in myanmar">
        <meta name="keywords" content="handmade brand">
        <meta name="author" content="ppz">

         <!-- FONT AWESOME-->
        <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.css')}}">
        <!-- SIMPLE LINE ICONS-->
        <link rel="stylesheet" href="{{asset('admin/vendor/simple-line-icons/css/simple-line-icons.css')}}">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}" id="bscss">
        <!-- =============== APP STYLES ===============-->
        <!-- <link rel="stylesheet" href="{{asset('admin/css/app.css')}}" id="maincss"> -->
        <link rel="stylesheet" href="{{asset('admin/css/theme-g.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <!-- SELECT2-->
        <link rel="stylesheet" href="{{asset('admin/vendor/select2/dist/css/select2.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendor/%40ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <!-- BEGIN: CSS Assets-->
        <!-- library CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('resources/css/navigation.css')}}">
        <!-- END: CSS Assets-->

        <!-- Datatables -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>
<!-- END: Head -->
    <body>
        <!-- navigation bar and side menu -->
        @include('dashboard.navbar')
        
        <!-- Page footer-->
        @include('layouts.footer')

        <!-- =============== VENDOR SCRIPTS ===============-->
        <!-- Datatables-->
      
        <!-- MODERNIZR -->
        <script src="{{asset('admin/vendor/modernizr/modernizr.custom.js')}}"></script>
        <!-- JQUERY-->
        <script src="{{asset('admin/vendor/jquery/dist/jquery.js')}}"></script>
        <!-- BOOTSTRAP-->
        <script src="{{asset('admin/vendor/popper.js/dist/umd/popper.js')}}"></script>
        <script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
        <!-- STORAGE API-->
        <script src="{{asset('admin/vendor/js-storage/js.storage.js')}}"></script>
        <!-- JQUERY EASING-->
        <script src="{{asset('admin/vendor/jquery.easing/jquery.easing.js')}}"></script>
        <!-- ANIMO-->
        <script src="{{asset('admin/vendor/animo/animo.js')}}"></script>
        <!-- SCREENFULL-->
        <script src="{{asset('admin/vendor/screenfull/dist/screenfull.js')}}"></script>
        <!-- LOCALIZE-->
        <script src="{{asset('admin/vendor/jquery-localize/dist/jquery.localize.js')}}"></script>
        <!-- =============== PAGE VENDOR SCRIPTS ===============-->
        <!-- SPARKLINE-->
        <script src="{{asset('admin/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
        <!-- FLOT CHART-->
        <script src="{{asset('admin/vendor/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('admin/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js')}}"></script>
        <script src="{{asset('admin/vendor/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('admin/vendor/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('admin/vendor/flot/jquery.flot.time.js')}}"></script>
        <script src="{{asset('admin/vendor/flot/jquery.flot.categories.js')}}"></script>
        <script src="{{asset('admin/vendor/jquery.flot.spline/jquery.flot.spline.js')}}"></script>
        <!-- EASY PIE CHART-->
        <script src="{{asset('admin/vendor/easy-pie-chart/dist/jquery.easypiechart.js')}}"></script>
        <!-- MOMENT JS-->
        <script src="{{asset('admin/vendor/moment/min/moment-with-locales.js')}}"></script>
        <script src="{{asset('admin/vendor/select2/dist/js/select2.full.js')}}"></script>
        <!-- =============== APP SCRIPTS ===============-->
        <script src="{{asset('admin/js/app.js')}}"></script>
        <script src="{{asset('admin/vendor/select2/dist/js/select2.full.js')}}"></script>
        <script src="{{asset('admin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
        @yield('script')
    </body>
</html>
