@extends('dashboard.master')

@section('title', 'Admin Page')

@section('content')
<div class="row">
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-top: -2%;">
    <div class="row" style="margin-left: 1%;">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -1%;">
                <h1>Video Categories</h1>
            </div>
        </div><!--/.row-->
        <hr>
        @foreach ($category->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $categories)
                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success" style="margin-bottom: 2%;">
                            <h6 class="text-uppercase" style="font-size: 2rem"></h6>
                            
                        </div>
                    <i style="width: 20em;" class="devicon-{{ strtolower($categories->name) }}-plain colored"></i>
                            <h6 class="text-uppercase" style="font-size: 2rem">{{ $categories->name }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
         @endforeach
</div>
@endsection