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
        <div class="container">
            @if (count($favouritedVideos) > 0)
            <div class="row">
                @foreach ($favouritedVideos as $key => $value)
                <div class="row">
                    @foreach ($value->get()->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $videos)
                        <div class="col-sm-3">
                            <div class="card-deck-wrapper">
                                <div class="card-deck sidebar-inner">
                                    <div class="card" >
                                        <a href="{{ route('show_video', ['id' => $videos->first()->id]) }}">
                                            <img class="video-iframe" src="http://img.youtube.com/vi/{{ $videos->first()->url }}/0.jpg">
                                        </a>
                                        <div class="card-block" >
                                            <a class="card-title" style="width: 250px; overflow: hidden; text-overflow: ellipsis; " href="{{ route('show_video', ['id' => $videos->first()->id]) }}">{{substr($videos->first()->title, 0, 35) }} {{ strlen($videos->first()->title) > 35 ? '...': ''}}</a>
                                            <p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($videos->first()->created_at))->diffForHumans() }}</p>
                                            <span class="pull-right" style="margin-top: -10%; margin-right: -5%;"><a href="{{ route('delete-video', ['id' => $videos->first()->id]) }}" class="delete-video"><button class="btn btn-primary btn-flat" style="width: 60px;">Delete</button></a></span>
                                            <span class="pull-right" style="margin-right: 5%; margin-top: -10%;"><a href="/video/edit/{{ $videos->first()->id }}"><button class="btn btn-primary btn-flat" style="width: 60px;">Edit</button></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        @else
        <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">You don't have any favourited video yet</h4>
        @endif
    </div>
</div>
</div>
@endsection