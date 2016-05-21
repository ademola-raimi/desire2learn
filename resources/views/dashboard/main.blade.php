@extends('dashboard.master')
@section('title', 'Admin Page')
@section('content')
<div class="row">
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row" style="margin-left: 1%;">
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-eye fa-5x"></i>
                    </div>
                    <h6 class="text-uppercase" style="font-size: 2rem">Views</h6>
                    <h1 class="display-1">134</h1>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-thumbs-up fa-5x"></i>
                    </div>
                    <h6 class="text-uppercase" style="font-size: 2rem">Likes</h6>
                    <h1 class="display-1">134</h1>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                    <div class="rotate">
                        <i class="fa fa-star-o fa-5x"></i>
                    </div>
                    <h6 class="text-uppercase" style="font-size: 2rem">Favourites</h6>
                    <h1 class="display-1">134</h1>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection