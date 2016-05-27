<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar" style="margin-top: 20%;">
            <li class="active"><a href="{{ route('dashboard.home') }}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
            </li>
            <li><a href="#" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Video Category</a>
            </li>
            <li><a href="#" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Uploaded Videos</a>
            </li>
            
            
            <li><a href="#" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-play-circle" aria-hidden="true"></span>Favourited videos</a>
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