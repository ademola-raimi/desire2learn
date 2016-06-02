@extends('layout.master')
@section('title', 'Welcome to D2l')
@section('content')
@include('layout.partials.top-nav-bar')
<!-- Start Header Section -->
<div class="banner">
    <div class="overlay">
        <div class="container">
            <div class="intro-text">
                <h1>Welcome To <span>Desire2Learn</span></h1>
                <p>Learning is not attained by chance, It must be sought for with ardor and attended with deligence <br> Dive in to get started</p>
                
                @if (! Auth::check())
                <a href="{{ route('register') }}" class="page-scroll btn btn-primary">Register</a>
                @else
                <a href="{{ route('dashboard.home') }}" class="page-scroll btn btn-primary">Dashboard</a>
                @endif
            </div>
            
        </div>
    </div>
</div>
<!-- End Header Section -->
<!-- Start Body Section -->
<div class="container">
    <div class="col-sm-3 sidenav">@include('layout.partials.side-nav-bar')</div>
    <div class="col-sm-9 sidebar">
        <div class="container">
            @if (count($videoResults) > 0)
            @foreach ($videoResults->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $videoResult)
                    <div class="col-sm-3">
                        <div class="card-deck-wrapper">
                            <div class="card-deck sidebar-inner">
                                <div class="card" >
                                    <a href="/video/{{ $videoResult->id }}">
                                        <img class="video-iframe" src="http://img.youtube.com/vi/{{ $videoResult->url }}/0.jpg">
                                    </a>
                                    <div class="card-block">
                                        <a class="card-title" style="width: 250px; overflow: hidden; text-overflow: ellipsis; " href="/video/{{ $videoResult->id }}">{{substr($videoResult->title, 0, 35) }} {{ strlen($videoResult->title) > 35 ? '...': ''}}</a>
                                        <p class="card-text">Creator: {{ $videoResult->user->username }}</p>
                                        <p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($videoResult->created_at))->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
            @else
            <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">Oops sorry No videos found for your search</h4>
            @endif
            <div class="button-details">
            {!! $video->render() !!}
        </div>
        </div>
        
    </div>
</div>
<!-- End Body Section -->
<!-- Start Call to Action Section -->
<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                <p>Knowledge is our passport to the future, for tomorrow belongs to the people who prepare for it today</p>
                <p>- Malcolm X -</p>
            </div>
        </div>
    </div>
</section>
<!-- End Call to Action Section -->
<!-- Start Footer Section -->
<footer class="container-fluid">
    @include('layout.partials.footer')
</footer>
<!-- End Footer Section -->
@endsection