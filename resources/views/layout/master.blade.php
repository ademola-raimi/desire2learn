<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
</head>
<body>

    @yield('content')
    
</body>
</html>

