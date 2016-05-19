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
</div>
</div>
