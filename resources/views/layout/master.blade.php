<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ URL::asset('images/logo.png') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico') }}">
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>

 <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
</head>
<body>

    @yield('content')
    
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}} 
</body>
</html>

