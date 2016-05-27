<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Videos By Category</h3>
        </div>
        <div class="panel-body popular-videos">
            @foreach ($categories as $category)
            <span class="badge">
            <i style="max-width: 2em;" class="devicon-{{ strtolower($category->name) }}-plain colored"></i>
            </span>
            @endforeach
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Popular-Most Viewed</h3>
        </div>
        <div class="panel-body popular-videos">
            
            
            <span class="badge">
                
            </span>
            
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Popular-Most Liked</h3>
        </div>
        <div class="panel-body popular-videos">
            <span class="badge">
                
            </span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Top video Publishers</h3>
        </div>
        <div class="panel-body popular-videos">
            <span class="badge">
                
            </span>
        </div>
    </div>
</div>