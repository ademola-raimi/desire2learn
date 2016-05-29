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
            <h3>Edit Video</h3>
            <hr>
            <form class="form" role="form" action="/video/edit/{{ $video->id }}/update" method="POST" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $video->title }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Youtube URL</label>
                    <input type="text" class="form-control" name="url" value="http://www.youtube.com/watch?v={{ $video->url }}">
                    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Video Description</label>
                    <textarea type="description" class="form-control" name="description" value="">{{ $video->description }}</textarea>
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
                         <option value="" > Video category</option>
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
                        <i class="fa fa-btn fa-user"></i> Update Video
                    </button>
                </div>
            </form>
           
          
        </div>
    </div>
</div>

@endsection