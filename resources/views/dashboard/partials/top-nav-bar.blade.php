<header class="clearfix">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        
        
        <!-- End Top Bar -->
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand text-default" href="/">Desire2Learn</a>
            </div>
            <div class="navbar-collapse collapse">
                
                <!-- Start Navigation List -->
                
                <ul class="nav navbar-nav navbar-right">

                    
                    <li class="top-search">
                        <form class="navbar-form navbar-right" style="width: 50%;">
                            <input type="text" class="form-control" placeholder="Search...">
                            <input type="submit" value=" ">
                        </form>
                    </li>
                    <!-- End Navigation List -->

                    <li>
                        {{ Auth::user()->username }} <img src="{{ Auth::user()->avatar }}" class="img-circle" style="width: 45px; height: 45px;" />
                    </li>
                    
                    <li><a class="play-icon popup-with-zoom-anim" href="{{ route('logout') }}">Logout</a></li>
                    
                    
                </ul>
                
                <!--End Navigation List-->
            </div>
        </div>
    </nav>
</header>