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
        <div class="col-md-6 col-md-offset-3 card" style="margin-top: 6%;">
            <h3>New Category upload</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post.category') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                    <label for="icon">Icon</label>
                    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
                    @if ($errors->has('icon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('icon') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Upload Category
                    </button>
                </div>
        
            </form>
           
          
        </div>
    </div>
</div>

@endsection