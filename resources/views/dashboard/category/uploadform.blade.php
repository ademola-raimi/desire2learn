@extends('dashboard.master')
@section('title', 'category upload')
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
            <h3 style="margin-top: 3%;">New Category upload</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post.category') }}" enctype="multipart/form-data">
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

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea type="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
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