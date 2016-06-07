@extends('dashboard.master')
@section('title', 'Your categories')
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
                <h1>Uploaded Video Categories</h1>
            </div>
            </div><!--/.row-->
            <hr>
            @if ($uploadedCategory->count() > 0)
            @foreach ($uploadedCategory->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $uploadedCategories)
                <div class="col-lg-3 col-md-3">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success" style="margin-bottom: 2%;">
                            <h6 class="text-uppercase" style="font-size: 2rem"></h6>
                            
                        </div>
                        <i style="padding-left: 20px" class="devicon-{{ strtolower($uploadedCategories->name) }}-plain colored"></i>
                        <h6 class="text-uppercase" style="font-size: 2rem">{{ $uploadedCategories->name }}</h6>
                        <span class="pull-right" style="margin-right: 1%; margin-top: -15%;"><a href="/category/edit/{{ $uploadedCategories->id }}"><button class="btn btn-primary btn-flat" style="width: 60px;">Edit</button></a></span>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="button-details">
                {!! $uploadedCategory->render() !!}
            </div>
            @else
            <h4 class="center-align padcast-page-header" style="margin-bottom:50px;">You haven't uploaded any category yet, click <a href="/category/create">here</a> to upload a category</h4>
            @endif
        </div>
        @endsection