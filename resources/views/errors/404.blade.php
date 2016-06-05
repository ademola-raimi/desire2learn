@extends('layout.master')
@section('title', '404 page')
@section('content')
<div class="container">
    <div class="row">
        <h4 class="error" style="margin-top: 3%;">404</h4>
        <p class="error-message" style="font-weight: 100px; margin-top: 2%; color: red;">
            It looks like there is an inbalance on the world wide web
        </p>
        <h3 class="error-exit-message">
        we are so sorry!
        </h3>
        <br>
        <a type="button" class="btn btn-primary" href="/">
            This way home
        </a>
        <br>
    </div>
</div>
<footer class="container-fluid" style="margin-top: 22%;">
    @include('layout.partials.footer')
</footer>
@endsection