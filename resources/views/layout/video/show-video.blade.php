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
						<li>
							<a type="button" class="btn btn-primary btn-sm like" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}" data-fav="{{ $video->favourites }}">
							<i class="fa fa-thumbs-up"> {{ count($video->likes) }} </i>
							</a>
						</li>
						<li>
							<a type="button" class="btn btn-primary btn-sm like" id="{{ $video->id }}" data-user="{{ Auth::user()->id }}" data-fav="{{ $video->favourites }}">
							<i class="fa fa-thumbs-down"> {{ count($video->likes) }} </i>
							</a>
						</li>
					</ul>
					<hr>
					<h6>Description</h6>
					
					<p> {{ $video->description }} </p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Start Footer Section -->
<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>
<!-- End Footer Section -->
@endsection