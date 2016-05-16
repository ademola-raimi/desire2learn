@extends('dashboard.master')


@section('title', 'Admin Page')

@section('content')

<div class="row">
@include('dashboard.partials.top-nav-bar')
</div>

<div class="row">
@include('dashboard.partials.side-nav-bar')
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 card">
            <h3>Update Profile</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post-profile') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="title">User name</label>
                    <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="title">Last name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}">
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="title">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}">
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="title">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                         <i class="fa fa-user"></i> Update
                        </button>
                </div>
            </form>

           <div class="form-group">
                    <legend>Profile Picture</legend>

                <form class="form" method="POST" action="{{ route('post-avatar') }}" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                        <img src="{{ Auth::user()->avatar_url }}" title="avatar" alt="avatar" class="img-circle">
                    </div>
                    <div class="form-group">
                        <input id="avatar" type="file" class="validate" name="avatar">
                   </div>
                   <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                         <i class="fa fa-plus"></i> Upload
                        </button>
                   </div>
                </form>
            </div>     

          
       </div> 
    </div>
</div>

@endsection