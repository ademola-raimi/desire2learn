@extends('dashboard.master')


@section('title', 'Admin Page')

@section('content')

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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="main-grids">
                <div class="top-grids">
                    <div class="recommended-info">
                        <h3>Recent Videos</h3>
                    </div>
                    <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="images/t1.jpg" alt="" /></a>
                            <div class="time">
                                <p>3:04</p>
                            </div>
                            <div class="clck">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info">
                            <h3><a href="single.html" class="title title-info">Pellentesque vitae pulvinar tortor nullam interdum metus a imperdiet</a></h3>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="images/t2.jpg" alt="" /></a>
                            <div class="time">
                                <p>7:23</p>
                            </div>
                            <div class="clck">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info">
                            <h3><a href="single.html" class="title title-info">Interdum pellentesque vitae pulvinar tortor nullam metus a imperdiet</a></h3>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">4,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="images/t3.jpg" alt="" /></a>
                            <div class="time">
                                <p>4:04</p>
                            </div>
                            <div class="clck">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info">
                            <h3><a href="single.html" class="title title-info">Nullam interdum metus a imperdiet pellentesque vitae pulvinar tortor</a></h3>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">71,174 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="recommended">
                    <div class="recommended-grids">
                        <div class="recommended-info">
                            <h3>Animated Cartoon</h3>
                        </div>
                        <script src="js/responsiveslides.min.js"></script>
                         <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                              // Slideshow 4
                              $("#slider3").responsiveSlides({
                                auto: true,
                                pager: false,
                                nav: true,
                                speed: 500,
                                namespace: "callbacks",
                                before: function () {
                                  $('.events').append("<li>before event fired.</li>");
                                },
                                after: function () {
                                  $('.events').append("<li>after event fired.</li>");
                                }
                              });
                        
                            });
                          </script>
                        <div  id="top" class="callbacks_container">
                            <ul class="rslides" id="slider3">
                                <li>
                                    <div class="animated-grids">
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>7:34</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c1.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>6:23</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus varius viverra nullam sit amet viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">14,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c2.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>2:45</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c3.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>4:34</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="animated-grids">
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c1.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>4:42</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Varius sit sed viverra viverra nullam nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c2.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>6:14</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c3.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>2:34</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">varius sit sed viverra viverra nullam Nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>5:12</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">1,14,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="animated-grids">
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c2.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>4:42</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Varius sit sed viverra viverra nullam nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c3.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>6:14</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>2:34</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">varius sit sed viverra viverra nullam Nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c3.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>5:12</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">1,14,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="animated-grids">
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c3.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>4:42</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Varius sit sed viverra viverra nullam nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>6:14</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c1.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>2:34</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">varius sit sed viverra viverra nullam Nullam interdum metus</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">2,114,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 resent-grid recommended-grid slider-first">
                                            <div class="resent-grid-img recommended-grid-img">
                                                <a href="single.html"><img src="images/c2.jpg" alt="" /></a>
                                                <div class="time small-time slider-time">
                                                    <p>5:12</p>
                                                </div>
                                                <div class="clck small-clck">
                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="resent-grid-info recommended-grid-info">
                                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                                <div class="slid-bottom-grids">
                                                    <div class="slid-bottom-grid">
                                                        <p class="author author-info"><a href="#" class="author">John Maniya</a></p>
                                                    </div>
                                                    <div class="slid-bottom-grid slid-bottom-right">
                                                        <p class="views views-info">1,14,200 views</p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="recommended">
                    <div class="recommended-grids">
                        <div class="recommended-info">
                            <h3>Recommended</h3>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r1.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>2:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra viverra nullam nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r2.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>3:02</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r3.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>1:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r4.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>2:09</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum viverra nullam metus varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recommended-grids">
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r4.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>6:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r5.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>7:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r6.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>6:09</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/r1.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>9:04</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="recommended">
                    <div class="recommended-grids">
                        <div class="recommended-info">
                            <h3>Sports</h3>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/g.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>7:30</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/g1.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>9:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum viverra nullam metus varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/g2.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>5:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/g3.jpg" alt="" /></a>
                                <div class="time small-time">
                                    <p>6:55</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="recommended-grids">
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/we2.jpg" alt=""></a>
                                <div class="time small-time">
                                    <p>7:30</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/we1.jpg" alt=""></a>
                                <div class="time small-time">
                                    <p>9:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum viverra nullam metus varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/we4.jpg" alt=""></a>
                                <div class="time small-time">
                                    <p>5:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="single.html"><img src="images/we3.jpg" alt=""></a>
                                <div class="time small-time">
                                    <p>6:55</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        
                </div>
            </div>

        </div>
        <div class="clearfix"> </div>
    <div class="drop-menu">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
          <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
        </ul>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('dashboard/js/bootstrap.min.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>


@endsection