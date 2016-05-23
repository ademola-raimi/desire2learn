 @extends('layout.master')


@section('title', 'Welcome to D2l')

@section('content')

@include('layout.partials.top-nav-bar')

<div class="container">
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
			<section id="comments">
                    <h6 class="section-title"><span id="count">{{ count($video->comments) }}</span> Comments</h6>
                    @if (count($video->comments) == 0)
                        <p class="no-coments-message">No comments for this video</p>
                    @endif
                    <ol class="comments-list">
                    @foreach ($comments as $comment)
                        <li class="comment">
                            <article>
                                <img src="{{ $comment->user->getAvatar() }}" alt="avatar" class="avatar" width="50px" height="50px">
                                <div class="comment-meta">
                                    <h6 class="author">{{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</h6>
                                </div>
                                <!-- end .comment-meta -->
                                <div class="comment-body">
                                    <p>{{ $comment->comment }}</p>
                                </div>
                                <!-- end .comment-body -->
                            </article>
                        </li>
                    @endforeach
                    </ol>
                    <!-- end .comment-body -->
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