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
        @can ( 'super-special-admin', Auth::user()->role_id )
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-eye fa-10x" style="padding: 50px; font-size: 5rem"></i>
                    </div>
                    <div class="user-stat" style="padding-left: 30px;">
                        <h6 class="text-uppercase">Uploaded categories</h6>
                        <h1 class="display-1" style="padding-left: 45px;">{{ $categories->count() }}</h1>
                    </div>
                </div>
                
            </div>
        </div>
        @endcan
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate" >
                        <i class="fa fa-thumbs-up fa-10x" style="padding: 50px; font-size: 5rem"></i>
                    </div>
                    <div class="user-stat" style="padding-left: 40px;">
                        <h6 class="text-uppercase">Favourited Videos</h6>
                        <h1 class="display-1" style="padding-left: 30px;">{{ $favouritedVideos->count() }}</h1>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-file-video-o fa-10x" style="padding: 50px; font-size: 5rem"></i>
                    </div>
                    <div class="user-stat" style="padding-left: 40px;">
                        <h6 class="text-uppercase" >Uploaded Videos</h6>
                        <h1 class="display-1" style="padding-left: 30px;">{{ $uploadedVideos->count() }}</h1>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection