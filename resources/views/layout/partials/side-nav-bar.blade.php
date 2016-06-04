<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title" style="font-size: 1rem;">Videos By Category</h1>
        </div>
        <div class="panel-body popular-videos">
        <div class="row">
            
            <div class="row" >
                    <div class="card card-inverse card-success" style="background-color: white; width: 80%; margin-left: 9%; border: 1px solid #e5e5e5">
                        <div class="card-block bg-success" style="margin-bottom: 4%; background-color: #e5e5e5;">
                        </div>
                    <i style="width: 20em;" class="devicon-git-plain colored"></i>
                            <a class="text-uppercase" href="{{ route('index') }}">All</a>
                    </div>
                    @foreach ($categories as $category)
                    <div class="card card-inverse card-success" style="background-color: white; width: 80%; margin-left: 9%; border: 1px solid #e5e5e5">
                        <div class="card-block bg-success" style="margin-bottom: 4%; background-color: #e5e5e5;">
                        </div>
                    <i style="width: 20em;" class="devicon-{{ strtolower($category->name) }}-plain colored"></i>
                            <a class="text-uppercase" href="/category/{{ $category->id }}/videos">{{ $category->name }}</a>
                    </div>
                    @endforeach
            </div>
            
        </div>    
        </div>
    </div>
</div>
