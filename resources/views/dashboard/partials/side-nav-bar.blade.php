<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar" style="margin-top: 20%;">
            <li class="active"><a href="{{ route('dashboard.home') }}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
            </li>
            <li><a href="{{ route('all.categories') }}" class="user-icon"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>Video Categories</a>
            </li>

            @can ( 'super-admin', Auth::user()->role_id )
            <li><a href="{{ route('uploaded.categories') }}" class="user-icon"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Uploaded Categories</a>
            </li>
            <li><a href="{{ route('create-category') }}" class="user-icon" ><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Upload Category</a>
            </li>
            @endcan

            <li><a href="{{ route('uploaded.video') }}" class="user-icon"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>Uploaded Videos</a>
            </li>
            <li><a href="{{ route('create.video') }}" class="user-icon"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>Upload video</a>
            </li>
        </ul>
        <!-- script-for-menu -->
        <div class="side-bottom">
            <div class="copyright">
                <strong style="color: #fff"> #TIA {{ \Carbon\Carbon::now()->year }}.</strong>
                <strong style="color: #fff">Made with <i class="fa fa-heart" style="color:red;"></i>
                <span class="incognito-text">By</span> <a href="https://github.com/andela-araimi" target="_blank">Demo</a></strong>
            </div>
        </div>
    </div>
</div>