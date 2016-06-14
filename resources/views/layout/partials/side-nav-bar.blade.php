<div class="col-md-12 mobile-panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title" style="font-size: 1rem;">Videos By Category</h1>
        </div>
        <div class="panel-body popular-videos">
            <div class="row">
                
                
                <div class="panel-body" style="margin-top: -8%;">
                    <div class="row" style="margin-top: 2%; margin-left: -1.2%; margin-bottom: 8%">
                        <i style="width: 20em; padding-left: 5%;" class="devicon-git-plain colored"></i>
                        <a class="text-uppercase" href="{{ route('show-all-category') }}">All</a>
                    </div>
                    @foreach ($categories as $category)
                     <div class="panel-body" style="margin-top: -5%;">
                        <i style="width: 20em;" class="devicon-{{ strtolower($category->name) }}-plain colored"></i>
                        <a class="text-uppercase" href="/category/{{ $category->id }}/videos">{{ $category->name }}</a>
                      </div>
                    @endforeach
                </div>
            </div>
                
         
        </div>
    </div>
</div>
