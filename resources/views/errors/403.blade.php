@extends('layout.master')

@section('title', 'Sign-Up your data')

@section('content')

@include('layout.partials.top-nav-bar')

    <div class="container">
        <div class="row">
        <div class="error">404</div>
            <div class="error-message">
                Sorry, our favourite user. The page you are tring to visit is bared for regular users, please upgrade your account.
            </div>

            <h3 class="error-exit-message">
                we are so sorry!
            </h3>

            <br>

            <a class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="This way home" href="/">
                <i class="large material-icons">store</i>
            </a>

            <br>
    </div>
    </div>

<footer class="container-fluid">
    @include('layout.partials.footer')
</footer>

@endsection
