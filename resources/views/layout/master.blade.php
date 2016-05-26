<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link href="{!! load_asset('images/logo.png') !!}" rel="stylesheet">

    <link rel="shortcut icon" href="{!! load_asset('/images/favicon.ico') !!}">
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
    
    <link href="{!! load_asset('css/app.css') !!}" rel="stylesheet">
    <link href="{!! load_asset('css/main.css') !!}" rel="stylesheet">

    <!-- Bootstrap CSS  -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Devicons CSS  -->
    <link href="//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css" rel="stylesheet">
    <link href="{!! load_asset('devicons-master/css/devicons.min.css') !!}"

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{!! load_asset('font-awesome/css/font-awesome.min.css') !!}">
    <link href="{!! load_asset ('sweetalert/sweetalert.css') !!}" rel="stylesheet"/>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{!! load_asset('css/owl.carousel.css') !!}">
    <link rel="stylesheet" href="{!! load_asset('css/owl.theme.css') !!}">
    <link rel="stylesheet" href="{!! load_asset('css/owl.transitions.css') !!}">
    
    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" href="{!! load_asset('css/animate.css') !!}">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="{!! load_asset('css/lightbox.css') !!}">

    <!-- Sulfur CSS Styles  -->
    <link rel="stylesheet" href="{!! load_asset('css/style.css') !!}">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" href="{!! load_asset('css/responsive.css') !!}">

    <link rel="stylesheet" href="{!! load_asset('js/modernizrr.js') !!}">
</head>
<body>

    @yield('content')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <!-- <script src="{!! load_asset('js/jquery-2.1.3.min.js') !!}"></script> -->
    <script src="{!! load_asset('js/jquery-migrate-1.2.1.min.js') !!}"></script>
    <script src="{!! load_asset('js/owl.carousel.min.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.appear.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.fitvids.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.nicescroll.min.js') !!}"></script>
    <script src="{!! load_asset('js/lightbox.min.js') !!}"></script>
    <script src="{!! load_asset('js/count-to.js') !!}"></script>
    <script src="{!! load_asset('js/styleswitcher.js') !!}"></script>
    <script src="{!! load_asset('js/map.js') !!}"></script>
    <script src="{!! load_asset('js/map.js') !!}"></script>
    <script src="{!! load_asset('sweetalert/sweetalert.min.js') !!}"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

   
    @include('sweet::alert')

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{!! load_asset('js/script.js') !!}"></script>
    <script src="{!! load_asset('js/main.js') !!}"></script>
    <script src="{!! load_asset('js/comment.js') !!}"></script>
</body>
</html>
