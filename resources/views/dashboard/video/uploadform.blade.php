@extends('dashboard.master')
@section('title', 'video upload form')
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
            <h3 style="margin-top: 3%;">New Video upload</h3>
            <hr>
            <form class="form" role="form" method="POST" action="{{ route('post.video') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Youtube URL</label>
                    <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                    @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Video Description</label>
                    <textarea type="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <fieldset>
                        <legend>Select Category</legend>
                        
                        <label for="category">Video Category</label>
                        
                        <select class = "form-control" name="category">
                            <option value="" >Video Category</option>
                            @foreach($categories as $category)
                            
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        
                    </fieldset>
                    @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Upload Video
                    </button>
                </div>
            </form>
            
            
        </div>
    </div>
</div>
@endsection
