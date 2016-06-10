<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu" style="margin-left: 10%;">MENU</div>
        
        <div class="clearfix"> </div>
    </div>

    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar" style="margin-top: 20%;">
            <li><a href="{{ route('dashboard.home') }}" class="active-page"><i class="fa fa-home" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Home</a>
            </li>
            <li><a href="{{ route('all.categories') }}"><i class="fa fa-first-order" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Video Categories</a>
            </li>
            @can ( 'super-special-admin', Auth::user()->role_id )
            <li><a href="{{ route('uploaded.categories') }}"><i class="fa fa-cloud-upload" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Uploaded Categories</a>
            </li>
            <li><a href="{{ route('create-category') }}"><i class="fa fa-upload" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Upload Category</a>
            </li>
            @endcan
            <li><a href="{{ route('video.uploads') }}"><i class="fa fa-video-camera" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Uploaded Videos</a>
            </li>
            <li><a href="{{ route('video.favourites') }}"><i class="fa fa-star" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Favourited Videos</a>
            </li>
            <li><a href="{{ route('create.video') }}"><i class="fa fa-file-video-o" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Upload video</a>
            </li>
            @can ( 'special-admin', Auth::user()->role_id )
            <li><a href="{{ route('admin-form') }}"><i class="fa fa-plus" aria-hidden="true" style="margin: 0 0.5em 0 0;"></i>Create Admin User</a>
            </li>
            @endcan
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
