@extends('layout.master')
@section('title', 'Welcome to D2l')
@section('content')
@include('layout.partials.top-nav-bar')
<!-- Start Header Section -->
<div class="row" style="background-color: #f5f5f5;">
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
										<a class="card-title" style="width: 250px; overflow: hidden; text-overflow: ellipsis; " href="/video/{{ $videos->id }}">{{substr($videos->title, 0, 30) }} {{ strlen($videos->title) > 30 ? '...': ''}}</a>
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
				<h4 class="center-align padcast-page-header" style="margin-bottom:50px;">Oops sorry there are no videos under this category yet</h4>
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
