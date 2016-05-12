<div class="col-sm-3 col-md-2 sidebar">
            <div class="top-navigation">
                <div class="t-menu">MENU</div>
                <div class="t-img">
                    <img src="images/lines.png" alt="" />
                </div>
                <div class="clearfix"> </div>
            </div>
                <div class="drop-navigation drop-navigation">
                  <ul class="nav nav-sidebar">
                    <li class="active"><a href="/" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li><a href="shows.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Video Category</a></li>
                    <li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Uploaded Videos</a></li>
                    
                    
                    <li><a href="movies.html" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Favourited videos</a></li>
                    <li><a href="news.html" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>News</a></li>
                  </ul>
                  <!-- script-for-menu -->
                        <script>
                            $( ".top-navigation" ).click(function() {
                            $( ".drop-navigation" ).slideToggle( 300, function() {
                            // Animation complete.
                            });
                            });
                        </script>
                    <div class="side-bottom">
                        <div class="side-bottom-icons">
                            <ul class="nav2">
                                <li><a href="https://www.facebook.com/raimi.a.ademola" class="facebook"> </a></li>
                                <li><a href="https://twitter.com/demo004" class="facebook twitter"> </a></li>
                                <li><a href="https://plus.google.com/u/0/" class="facebook chrome"> </a></li>
                            </ul>
                        </div>
                        <div class="copyright">
                            <strong style="color: #fff"> #TIA {{ \Carbon\Carbon::now()->year }}.</strong>
                            <strong style="color: #fff">Made with <i class="fa fa-heart" style="color:red;"></i>
                            <span class="incognito-text">By</span> <a href="https://github.com/andela-araimi" target="_blank">Demo</a></strong>
                        </div>
                    </div>
                </div>
        </div>