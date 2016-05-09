@extends('layout.master')

@section('title', 'Sign-Up your data')

@section('content')

@include('layout.partials.top-nav-bar')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 card">
            <h3>Register with Us, or <a href="{{ url('/login') }}">Log In</a></h3>
            <form class="form" role="form" method="POST" action="{{ route('auth.create-new-user') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name">Last Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name">First Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </form>
            <div class="auth-or">
                <hr class="hr-or">
                <span class="span-or">OR</span>
          </div>
          <div class="row">
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-md btn-primary btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="{{ url('/auth/twitter') }}" class="btn btn-md btn-block btn-social btn-twitter">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                </div>
                <div class="col-xs-12 col-md-4">
                  <a href="{{ url('/auth/github') }}" class="btn btn-md btn-block btn-social btn-github">
                        <i class="fa fa-github"></i> Github
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>

@endsection