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
                <h1>Uploaded Videos</h1>
            </div>
        </div><!--/.row-->
        <hr style="margin-top: 1%;">
        <div class="container">
            @if (count($uploadedVideos) > 0)
            @foreach ($uploadedVideos->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $video)
                <div class="col-sm-3">
                    <div class="card-deck-wrapper">
                        <div class="card-deck sidebar-inner">
                            <div class="card" >
                                <a href="{{ route('show_video', ['id' => $video->id]) }}">
                                    <img class="video-iframe" src="http://img.youtube.com/vi/{{ $video->url }}/0.jpg">
                                </a>
                                <div class="card-block" >
                                    <a class="card-title href="{{ route('show_video', ['id' => $video->id]) }}">{{substr($video->title, 0, 30) }} {{ strlen($video->title) > 30 ? '...': ''}}</a>
                                    <p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($video->created_at))->diffForHumans() }}</p>
                                    <span class="pull-right" style="margin-top: -10%; margin-right: -2%;"><a href="{{ route('delete-video', ['id' => $video->id]) }}" class="delete-video"><button class="btn btn-primary btn-flat" style="width: 60px; background-color: #8899a6 ! important; border: none;">Delete</button></a></span>
                                    <span class="pull-right" style="margin-right: 5%; margin-top: -10%;"><a href="/video/{{ $video->id }}/edit"><button class="btn btn-primary btn-flat" style="width: 60px; background-color: #8899a6 ! important; border: none;">Edit</button></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="button-details">
                {!! $uploadedVideos->render() !!}
            </div>
            @else
            <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">You haven't uploaded any video yet, click <a href="/dashboard/video/create">here</a> to upload a video</h4>
            @endif
        </div>
    </div>
</div>
@endsection