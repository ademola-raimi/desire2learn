@extends('dashboard.master')
@section('title', 'Your uploaded videos')
@section('content')
<div class="row">
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row" style="margin-left: 1%;">
        <div class="row">
            <div class="col-lg-12" style="margin-top: -3%;">
                <h1>Favourited Videos</h1>
            </div>
        </div><!--/.row-->
        <hr style="margin-top: 1%;">
        <div class="container">
            @if (count($favouritedVideos) > 0)
            @foreach ($favouritedVideos->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $video)
                <div class="col-sm-3">
                    <div class="card-deck-wrapper">
                        <div class="card-deck sidebar-inner">
                            <div class="card" >
                                <a href="{{ route('show_video', ['id' => $video->video->id]) }}">
                                    <img class="video-iframe" src="http://img.youtube.com/vi/{{ $video->video->url }}/0.jpg">
                                </a>
                                <div class="card-block" >
                                    <a class="card-title" style="margin-bottom: 200px;" href="{{ route('show_video', ['id' => $video->video->id]) }}">{{substr($video->video->title, 0, 10) }} {{ strlen($video->video->title) > 10 ? '...': ''}}</a>
                                    <p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($video->video->created_at))->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="button-details">
                {!! $favouritedVideos->render() !!}
            </div>
            @else
            <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">You don't have any favourited video yet</h4>
            @endif
        </div>
    </div>
</div>
@endsection