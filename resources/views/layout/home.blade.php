@extends('layout.master')
@section('title', 'Welcome to D2l')
@section('content')
@include('layout.partials.top-nav-bar')
<!-- Start Header Section -->
<div class="row" style="background-color: #f5f5f5;">
	<div class="banner">
		<div class="overlay">
			<div class="container">
				<div class="intro-text">
					<h1>Welcome To <span>Desire2Learn</span></h1>
					<p>Learning is not attained by chance, It must be sought for with ardor and attended with deligence <br> Dive in to get started</p>
					
					@if (! Auth::check())
					<a href="{{ url('/facebook') }}" class="page-scroll btn btn-primary mobile-btn" style="background-color: #3B5998; width: 20%; border: none;">
						<i class="fa fa-facebook"></i> Sign In With Facebook
					</a>
					<a href="{{ url('/twitter') }}" class="page-scroll btn btn-primary mobile-btn" style="background-color: #55ACEE; width: 20%; border: none;">
						<i class="fa fa-twitter"></i> Sign In with Twitter
					</a>
					<a href="{{ url('/github') }}" class="page-scroll btn btn-primary mobile-btn" style="background-color: #444444; width: 20%; border: none">
						<i class="fa fa-github"></i> Sign In with Github
					</a>
					@else
					<a href="{{ route('dashboard.home') }}" class="page-scroll btn btn-primary" style="background-color: #8899a6; border: none;">Dashboard</a>
					<a href="{{ route('create.video') }}" class="page-scroll btn btn-primary" style="background-color: #8899a6; border: none;">Upload Video</a>
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
				@if (count($video) > 0)
				@foreach ($video->chunk(3) as $chunk)
				<div class="row">
					@foreach ($chunk as $videos)
					<div class="col-sm-3">
						<div class="card-deck-wrapper">
							<div class="card-deck sidebar-inner">
								<div class="card" style="background-color: #fff;">
									<a href="/video/{{ $videos->id }}">
										<img src="http://img.youtube.com/vi/{{ $videos->url }}/0.jpg">
									</a>
									<div class="card-block">
										<a class="card-title" style="width: 250px; overflow: hidden; text-overflow: ellipsis; " href="/video/{{ $videos->id }}">{{substr($videos->title, 0, 10) }} {{ strlen($videos->title) > 30 ? '...': ''}}</a>
										<p class="card-text">Creator: {{ $videos->user->username }}</p>
										<p class="card-text">{{ Carbon\Carbon::createFromTimeStamp(strtotime($videos->created_at))->diffForHumans() }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				@endforeach
				@else
				<h4 class="center-align padcast-page-header" style="margin-bottom:50px;">Oops sorry we have no videos yet</h4>
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
</div>
@endsection