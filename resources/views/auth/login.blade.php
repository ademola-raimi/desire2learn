@extends('layout.master')
@section('title', 'Sign-in your data')
@section('content')
@include('layout.partials.top-nav-bar')
<div class="row" style="background-color: #f5f5f5;">
    <div class="container" >
        <div class="col-md-6 col-md-offset-3 card" style="margin-top: 3%; margin-bottom: 3%; background-color: #fff;">
            <h3 style="margin-top: 3%; margin-bottom: 3%;">Log In, or <a href="{{ route('register') }}">Sign Up</a></h3>
            <form role="form" method="POST" action="{{ route('post-login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <a class="pull-right" href="{{ url('/password/reset') }}">Forgot password?</a>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="checkbox pull-right">
                    <label style="margin-left: -2%;"><input id="remember" name="remember" type="checkbox">Remember me</label>
                </div>
                <button type="submit" class="btn btn btn-primary" style="background-color: #008db7; border: none;">Log In</button>
            </form>
            <div class="auth-or">
                <hr class="hr-or">
                <span class="span-or">OR</span>
            </div>
            <div class="row" style="margin-bottom: 3%;">
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/facebook') }}" class="btn btn-md btn-primary btn-block btn-social btn-facebook" style="background-color: #3B5998; border: 1px solid #3B5998;">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/twitter') }}" class="btn btn-md btn-primary btn-block btn-social btn-twitter" style="background-color: #55ACEE; border: 1px solid #55ACEE;">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/github') }}" class="btn btn-md btn-primary btn-block btn-social btn-github" style="background-color: #444444; border: 1px solid #444444;">
                        <i class="fa fa-github"></i> Github
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid" style="margin-top: 10%;">
        @include('layout.partials.footer')
    </footer>
</div>
@endsection
