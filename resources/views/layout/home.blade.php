@extends('layout.master')


@section('title', 'Welcome to D2l')

@section('content')

@include('layout.partials.top-nav-bar')

<div class="container">
	<div class="full-size-container-content  bottom-space  ">
		<div id="overlay-image">
			<img src="{!! load_asset('images/hero-image.jpg') !!}" class="img-responsive" alt="Responsive image">
		</div>
	</div>
</div>

<div class="container">
	<div class="col-sm-3 sidenav">@include('layout.partials.side-nav-bar') </div>

	<div class="col-sm-9">

	</div>
</div>

<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>


@endsection