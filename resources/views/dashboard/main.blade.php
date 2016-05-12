@extends('layout.master')


@section('title', 'Welcome to D2l')

@section('content')

@include('layout.partials.top-nav-bar')


        
        
        <!-- Start Header Section -->
        <div class="banner">
            <div class="overlay">
                <div class="container">
                    <div class="intro-text">
                        <h1>Welcome To The <span>Desire2Learn</span></h1>
                        <p>Learning is not attained by chance, It must be sought for with ardor and attended with deligence <br> Dive in to get started</p>
                        <a href="{{ route('auth.register') }}" class="page-scroll btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Section -->
        
  <div class="container">
	<div class="col-sm-3 sidenav">@include('layout.partials.side-nav-bar') </div>

	<div class="col-sm-9">

	</div>
</div>
        
        <!-- Start Call to Action Section -->
    <!-- <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                    <p>Awesome Aires Template is ready for <br> Business, Agency, Landing or Creative Portfolio<br>Aires is Responsive and help you to grow your business</p>
                </div>
            </div>
        </div>
    </section> -->
        

<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>


@endsection