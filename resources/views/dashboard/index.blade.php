@extends('dashboard.master')
@section('title', 'Index page')
@section('content')
<div class="row" >
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
    <div class="row" style="margin-left: 1%;">
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-eye fa-5x" style="padding: 20px; font-size: 2rem"></i>
                    </div>
                    <h6 class="text-uppercase">Views</h6>
                    <h1 class="display-1">{{ $views->count() }}</h1>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate" >
                        <i class="fa fa-puzzle-piece fa-5x" style="padding: 10px; font-size: 2rem" aria-hidden="true"></i>
                    </div>
                    <h6 class="text-uppercase">Reactions</h6>
                    <h1 class="display-1">{{ $reactions->count() }}</h1>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-file-video-o fa-5x" style="padding: 20px; font-size: 2rem"></i>
                    </div>
                    <h6 class="text-uppercase" >Uploaded Videos</h6>
                    <h1 class="display-1">{{ $uploadedVideos->count() }}</h1>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection