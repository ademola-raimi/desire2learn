@extends('layout.master')

@section('title', 'Sign-Up your data')

@section('content')

@include('layout.partials.top-nav-bar')

    <div class="container">
        <div class="row">
        <div class="error">404</div>
            <div class="error-message">
                <p>You already have an account with us, plz login to continue. Thanks</p>
            </div>

            <br>

            <a class="btn-primary btn" href="{{ route('login') }}">Login
                <i class="large material-icons"></i>
            </a>

            <br>
    </div>
    </div>

<footer class="container-fluid">
    @include('layout.partials.footer')
</footer>

@endsection
