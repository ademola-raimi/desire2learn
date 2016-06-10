@extends('dashboard.master')
@section('title', 'superadmin creation form')
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
            <h3>Super-Admin form</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post.superadmin') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="background-color: #8899a6 ! important; border: none;">
                    <i class="fa fa-btn fa-user"></i>Submit
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
