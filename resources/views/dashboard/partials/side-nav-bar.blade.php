<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar" style="margin-top: 20%;">
            <li class="active"><a href="{{ route('dashboard.home') }}" class="home-icon"><i class="fa fa-home" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i></span>Home</a>
            </li>
            <li><a href="{{ route('all.categories') }}" class="user-icon"><i class="fa fa-first-order" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Video Categories</a>
            </li>

            @can ( 'super-admin', Auth::user()->role_id )
            <li><a href="{{ route('uploaded.categories') }}" class="user-icon"><i class="fa fa-cloud-upload" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Uploaded Categories</a>
            </li>
            <li><a href="{{ route('create-category') }}" class="user-icon" ><i class="fa fa-upload" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Upload Category</a>
            </li>
            @endcan

            <li><a href="{{ route('uploaded.video') }}" class="user-icon"><i class="fa fa-video-camera" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Uploaded Videos</a>
            </li>
            <li><a href="{{ route('create.video') }}" class="user-icon"><i class="fa fa-file-video-o" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Upload video</a>
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