 @extends('layout.master')


@section('title', 'Welcome to D2l')

@section('content')

@include('layout.partials.top-nav-bar')

<div class="container" style="margin-bottom: 3%; margin-top: 3%;">
	<div class="row">
		<h2>{{ $video->title }}</h2>
		<div class="card">
			
			<iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $video->url }}" allowfullscreen style="margin-bottom: 20px;"></iframe>
		</div>
		<div class="container">
			<div class="row">
				<h3> {{ ucwords($video->title) }}</h3><p class="pull-right"><em>Created by </em><a href="#" ><strong> {{ ucwords($video->user->username) }}</strong></a></p>
				<div class="video_details">
					<ul class="list-inline">
						<li>
							<a type="button" class="btn btn-primary btn-sm views">
								<i class="fa fa-eye"> {{ $video->views }}  </i>
							</a>
						</li>
						<li><a type="button" class="btn btn-primary btn-sm comments"> <i class="fa fa-comment"> {{ count($video->comments) }}</i></a>
					</li>
					@if (! Auth::check())
					<li>
						<a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}">
							<i class="fa fa-thumbs-up"> {{ count($video->likes) }} </i>
						</a>
					</li>
					<li>
						<a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}">
							<i class="fa fa-thumbs-down"> {{ count($video->likes) }} </i>
						</a>
					</li>
					@else
					
					<li>
						<a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}">
							<i class="fa fa-thumbs-up"> {{ count($video->likes->where('like', 1)) }} </i>
						</a>
					</li>
					<li>
						<a type="button" class="btn btn-primary btn-sm vote" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}">
							<i class="fa fa-thumbs-down"> {{ count($video->likes->where('like', 0)) }} </i>
						</a>
					</li>
					@endif
				</ul>
				<hr>
				<h6>Description</h6>
				
				<p> {{ $video->description }} </p>
			</div>
			</div>
			  
			<section class="">
                <div>
                    <ul class="" data-collapsible="">
                        <li>
                            <div class="collapsible-body video_comments">
                                <ul class="collection">

                                <li class="load_comment" data-token="{{ csrf_token() }}">

                                @if ( count($latestComments) <= 0 )
                                    <h6 style="padding: 10px; font-weight:400; margin-left: -2%;">No comments to display for this video</h6>
                                @else
                                    @foreach ( $latestComments as $comment )
                                      <div id="show_comment" class="collection-item avatar show_comment">
                                            <div class="row">
                                                <div class="col s2">
                                                    <img src="{{ $comment->user->getAvatar() }}" alt="" class="circle" onerror="this.src='http://www.gravatar.com/avatar/\'.md5(strtolower(trim($comment->user->email))).\'?d=mm&s=500'">
                                                </div>
                                                <div class="col s10">
                                                    <div class="textarea-wrapper" data-comment-id="{{ $comment->id }}" data-token="{{ csrf_token() }}">
                                                        <span>
                                                            {{$comment->comments}}
                                                        </span>

                                                        @if( Auth::check() )

                                                            @if ( Auth::user()->id === $comment->user_id )
                                                            <div class="update-actions pull-right">
                                                                <a href="#" id="comment_action_caret" class="fa fa-bars no-style-link"></a>
                                                                <div id="comment_actions" style="display:none">
                                                                    <a href="#" class="fa fa-pencil comment-action-edit no-style-link" data-commentId="{{ $comment->comment_id }}"></a>
                                                                    <a href="#" class="fa fa-trash comment-action-delete no-style-link" data-commentId="{{ $comment->id }}"></a>
                                                                </div>
                                                            </div>

                                                             @endif
                                                        @endif
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
                                                <li>
                                                    <div class="view_more_comments" data-avatar="{{ Auth::user()->getAvatar() }}">
                                                        <a href="#" title="View more comments">
                                                            View more comments
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif
                                    <li class="collection-item avatar">
                                    
                                        <div class="row">
                                    


                                            <div class="img-circle">
                                                <img src="{{ Auth::user()->getAvatar() }}" alt="avatar" class="avatar" width="50px" height="50px" style="border-radius:25px;">
                                            </div>

                                            <form id="submit-comment"  method="POST">
                                                <div class="">
                                                    <input hidden="true" type="text" name="_token" id="_token" value="{{ csrf_token() }}">
                                                    <input hidden="true" type="text" name="video_id" id="video_id" value="{{ $video->id }}">
                                                    <input hidden="true" type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                                    <div class="">
                                                        <textarea name="comment" id="new-comment-field" class="validate" type="text" style="margin-top: 2%; width: 60%" required="true"> </textarea>
                                                    </div>
                                                    <button type="submit" data-token="{{ csrf_token() }}" data-comment-count="{{ $video->comments()->count() }}" data-avatar="{{ Auth::user()->getAvatar() }}" id="submit" class="btn btn-primary comment-submit" style=""><i class="fa fa-paper-plane-o"></i></button>
                                                </div>
                                            </form>
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
                        </li>
                    </ul>
                </div>
            </section>
		</div>
	</div>
</div>

<!-- Start Footer Section -->
<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>
<!-- End Footer Section -->
@endsection