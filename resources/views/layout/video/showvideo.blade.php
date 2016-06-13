@extends('layout.master')
@section('title', 'Welcome to D2l')
@section('content')
@include('layout.partials.top-nav-bar')
<div class="row" style="background-color: #f5f5f5;">
    <div class="container" style="margin-bottom: 6%; margin-top: 2%;>
        <div class="row">
            <div class="card">
                <iframe width="100%" height="550" src="http://www.youtube.com/embed/{{ $video->url }}?autoplay=1" allowfullscreen style="margin-bottom: -1%;"></iframe>
            </div>
            <div class="row" style="margin-left: 0.2%; margin-top: 2%;">
                <h3> {{ ucwords($video->title) }}</h3><p class="pull-right" style="margin-right: 1%;"><em>Created by </em><a href="#" ><strong> {{ ucwords($video->user->username) }}</strong></a></p>
                <div class="video_details" style="margin-top: 1%;">
                    <ul class="list-inline">
                        <li>
                            <p class="btn btn-primary btn-sm views" style="cursor: Auto;">
                                <i class="fa fa-eye"> {{ $video->views }} </i>
                            </p>
                        </li>
                        <li><p  class="btn btn-primary btn-sm comments" style="cursor: Auto;"> <i class="fa fa-comment"> {{ count($video->comments) }}</i></p>
                    </li>
                    @if (! Auth::check())
                    <li>
                        <a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}">
                            <i class="fa fa-thumbs-up"> {{ $like }} </i>
                        </a>
                    </li>
                    <li>
                        <a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}">
                            <i class="fa fa-thumbs-down"> {{ $unlike }} </i>
                        </a>
                    </li>
                    @else
                    
                    <li>
                        <a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}">
                            <i class="fa fa-thumbs-up"> {{ $like }} </i>
                        </a>
                    </li>
                    <li>
                        <a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}">
                            <i class="fa fa-thumbs-down"> {{ $unlike }} </i>
                        </a>
                    </li>
                    @endif
                </ul>
                <hr>
                @if (! Auth::check())
                <h6>Description</h6>
                
                <p> {{ $video->description }} </p>
                @else
                <h6>Description</h6>
                
                <p> {{ $video->description }} </p>
                @endif
                <hr>
            </div>
        </div>
        <section class="">
            <div>
                <ul class="" data-collapsible="">
                    <div class="col-sm-8 video_comments">
                        <li class="load_comment" data-token="{{ csrf_token() }}">
                            @if ( count($latestComments) <= 0 )
                            <h6 style="padding: 10px; font-weight:400; margin-left: -2%;">No comments to display for this video</h6>
                            @else
                            @foreach ( $latestComments as $comment )
                            <div class="container">
                                <div class="row" style="margin-top: 2%; margin-left: 1%;">
                                    <div class="col-sm-2">
                                        <img src="{{ $comment->user->getAvatar() }}" alt="" class="img-circle" width="25px" height="25px" style="border-radius:25px;" onerror="this.src='http://www.gravatar.com/avatar/\'.md5(strtolower(trim($comment->user->email))).\'?d=mm&s=500'">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="comment-body" style="margin-left: -12%; margin-top: 1%;" data-comment-id="{{ $comment->id }}" data-token="{{ csrf_token() }}">
                                            <span>
                                                <strong>{{$comment->comment}}</strong>,
                                            </span>
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </li>
                        @if ( Auth::check() )
                        @if( count($latestComments) > 0 )
                        <input type="hidden" id="video_id" value=" {{ $latestComments[0]['video_id'] }}" />
                        @endif
                        <li class="list-group">
                            <div class="container">
                                <div class="col-sm-2" style="margin-left: -4%; margin-top: 2%;">
                                    <img src="{{ Auth::user()->getAvatar() }}" alt="avatar" class="img-circle" width="50px" height="50px" style="border-radius:25px;">
                                </div>
                                <div class="col-sm-10">
                                    <form id="submit-comment" method="POST">
                                        <div class="row" style="margin-left: -15%;">
                                            <input hidden="true" type="text" name="_token" id="_token" value="{{ csrf_token() }}">
                                            <input hidden="true" type="text" name="video_id" id="video_id" value="{{ $video->id }}">
                                            <input hidden="true" type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                            
                                            <textarea name="comment" id="new-comment-field" class="form-control" rows="4" type="text" style="margin-top: 2%; width: 60%" required="true"> </textarea>
                                        </div>
                                        <button type="submit" data-token="{{ csrf_token() }}" data-comment-count="{{ $video->comments()->count() }}" data-avatar="{{ Auth::user()->getAvatar() }}" id="submit" class="btn btn-primary comment-submit" style="margin-left: 49.7%; margin-top: 1%; background-color: #8899a6; border: none;"><i class="fa fa-paper-plane-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @else
                        <li class="collection-item avatar">
                            <span>
                                <i class="fa fa-user fa-2x circle"></i>
                            </span>
                            <span style="color:#999;margin-left:40px;">
                                Only logged in users can comment.
                                <div class="point"></div>
                            </span>
                        </li>
                        @endif
                    </div>
                    <div class="col-sm-4 video_comments">
                        
                        <h4>Related Videos</h4>
                        <hr>
                        @foreach ( $relatedVideos as $relatedVideo )
                        <a href="{{ route('show_video', ['id' => $relatedVideo->id]) }}">
                            <img class="video-iframe" src="http://img.youtube.com/vi/{{ $relatedVideo->url }}/0.jpg" style="margin-bottom: 10px;">
                        </a>
                        
                        <a class="card-title" href="{{ route('show_video', ['id' => $relatedVideo->id]) }}">{{ $relatedVideo->title }}</a>
                        <p class="card-text">Creator: {{ $relatedVideo->user->username }}</p>
                        @endforeach
                    </div>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- Start Footer Section -->
<footer class="container-fluid">
    @include('layout.partials.footer')
</footer>
<!-- End Footer Section -->
@endsection
