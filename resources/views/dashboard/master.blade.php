
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Desire2learn" content="It's kinda like yotube where users can learn various programming lamguages at will for free. It's practical and at no cost" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="{!! load_asset('dashboard/css/bootstrap.min.css') !!}" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="{!! load_asset('dashboard/css/dashboard.css') !!}" rel="stylesheet">
<!-- Custom Theme files -->
<link href="{!! load_asset('dashboard/css/style.css') !!}" rel='stylesheet' type='text/css' media="all" />
<script src="{!! load_asset('dashboard/js/jquery-1.11.1.min.js') !!}"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{!! load_asset('images/logo.png') !!}" rel="stylesheet">

    <link rel="shortcut icon" href="{!! load_asset('/images/favicon.ico') !!}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{!! load_asset('font-awesome/css/font-awesome.min.css') !!}">

    
    <!-- Custom Theme files -->
   <link href="{!! load_asset ('sweetalert/sweetalert.css') !!}" rel="stylesheet"/>
    <!--start-smoth-scrolling-->
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <!-- //fonts -->

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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!--   <script src="{!! load_asset('dashboard/js/bootstrap.min.js') !!}"></script>
    <script src="{!! load_asset('js/jquery-2.1.3.min.js') !!}"></script>
    <script src="{!! load_asset('js/jquery-migrate-1.2.1.min.js') !!}"></script>
    <script src="{!! load_asset('bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! load_asset('js/owl.carousel.min.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.appear.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.fitvids.js') !!}"></script>
    <script src="{!! load_asset('js/jquery.nicescroll.min.js') !!}"></script>
    <script src="{!! load_asset('js/lightbox.min.js') !!}"></script>
    <script src="{!! load_asset('js/count-to.js') !!}"></script>
    <script src="{!! load_asset('js/styleswitcher.js') !!}"></script>
    <script src="{!! load_asset('js/map.js') !!}"></script>
    <script src="{!! load_asset('js/map.js') !!}"></script>
    <script src="{!! load_asset('sweetalert/sweetalert.min.js') !!}"></script> -->
   
    @include('sweet::alert')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
   <!--  <script src="assets/js/script.js"></script> --> 

    <script>
        $( ".top-navigation" ).click(function() {
        $( ".drop-navigation" ).slideToggle( 300, function() {
        // Animation complete.
        });
        });
        </script>
  
  </body>
</html>