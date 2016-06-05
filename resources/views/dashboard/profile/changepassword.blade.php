@extends('dashboard.master')
@section('title', 'change password')
@section('content')
<div class="row">
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 card" style="margin-top: 2%;">
            <h3>Change Password</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post-changepassword') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                    <label for="oldPassword">Old Password</label>
                    <input type="text" class="form-control" name="oldPassword" value="">
                    @if ($errors->has('oldPassword'))
                    <span class="help-block">
                        <strong>{{ $errors->first('oldPassword') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
                    <label for="newPassword">New Password</label>
                    <input type="text" class="form-control" name="newPassword" value="">
                    @if ($errors->has('newPassword'))
                    <span class="help-block">
                        <strong>{{ $errors->first('newPassword') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Submit
                    </button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>
@endsection
