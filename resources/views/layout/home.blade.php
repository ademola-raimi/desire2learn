@extends('layout.master')


@section('title', 'Welcome to D2l')

@section('content')

@include('layout.partials.top-nav-bar')
        
        <!-- Start Header Section -->
        <div class="banner">
            <div class="overlay">
                <div class="container">
                @if(session()->has('info'))
                
                    <script>
                        swal({
                            title: 'status',
                            text: '{!! session()->get("info") !!}',
                            timer: 2000,
                            showConfirmButton: false
                        })
                    </script>
            	@endif

            	 
                 <div class="intro-text">
                        <h1>Welcome To The <span>Desire2Learn</span></h1>
                        <p>Learning is not attained by chance, It must be sought for with ardor and attended with deligence <br> Dive in to get started</p>
                        @if (! Auth::check())
                        <a href="{{ route('register') }}" class="page-scroll btn btn-primary">Register</a>
                        @else 
                        <a href="{{ route('dashboard.index') }}" class="page-scroll btn btn-primary">Dashboard</a>
                    </div>
                  @endif

                 
                </div>

            </div>
        </div>
        <!-- End Header Section -->
        
 <div class="container">
	<div class="col-sm-3 sidenav">@include('layout.partials.side-nav-bar') </div>

	<div class="col-sm-9 sidebar">
		<div class="card-deck-wrapper">

		  <div class="card-deck sidebar-inner">
		    <div class="card">
		      <img class="card-img-top" data-src=".." alt="Card image cap">

		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="card-deck-wrapper">
		  <div class="card-deck sidebar-inner">
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		  </div>
		</div>


<div class="card-deck-wrapper">
		  <div class="card-deck sidebar-inner">
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" data-src="..." alt="Card image cap">
		      <div class="card-block">
		        <h4 class="card-title">Card title</h4>
		        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
		        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      </div>
		    </div>
		  </div>
		</div>




	</div>

</div>

	


        
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
        

<footer class="container-fluid">
	@include('layout.partials.footer')
</footer>


@endsection