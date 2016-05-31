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
        <div class="container">
            @if (count($uploadedVideo) > 0)
            @foreach ($uploadedVideo->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $video)
                    <div class="col-sm-3">
                        <div class="card-deck-wrapper">
                            <div class="card-deck sidebar-inner">
                                <div class="card">
                                    <a href="{{ route('show_video', ['id' => $video->id]) }}">
                                        <img class="video-iframe" src="http://img.youtube.com/vi/{{ $video->url }}/0.jpg">
                                    </a>
                                    <div class="card-block">
                                        <a class="card-title" style="width: 250px; overflow: hidden; text-overflow: ellipsis; " href="{{ route('show_video', ['id' => $video->id]) }}">{{ $video->title }}</a>

                                        <p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($video->created_at))->diffForHumans() }}</p>

                                        <span class="pull-right" style="margin-top: -15%;"><a href="{{ route('delete-video', ['id' => $video->id]) }}" class="delete-video"><button class="btn btn-primary btn-flat" style="width: 60px;">Delete</button></a></span>

                    <span class="pull-right" style="margin-right: 10%; margin-top: -15%;"><a href="/video/edit/{{ $video->id }}"><button class="btn btn-primary btn-flat" style="width: 60px;">Edit</button></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
             
            @else
            <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">Oops sorry You haven't uploaded any video yet</h4>
            @endif
            <div class="button-details">
                {!! $uploadedVideo->render() !!}
            </div> 
        </div>
    </div>
</div>
@endsection