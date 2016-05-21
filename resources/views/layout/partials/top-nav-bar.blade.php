<header class="clearfix">
        
    <!-- Start Top Bar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-bar">
                    <div class="row">
                            
                        <div class="col-md-6">
                            <!-- Start Contact Info -->
                            <ul class="contact-details">
                                <li><a href="#"><i class="fa fa-phone"></i> +2348132186996</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> ademola.raimi@andela.com</a>
                                </li> 
                            </ul>
                            <!-- End Contact Info -->
                        </div>
                        
                        <div class="col-md-6">
                            <!-- Start Social Links -->
                            <ul class="social-list">
                                <li>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/raimi.a.ademola"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/demo004"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/u/0/113673710058221497119/posts"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCQp6YdimUSJU0eFZDrSZynQ"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/raimi-ademola-33a39a5b?trk=hp-identity-name"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                            <!-- End Social Links -->
                        </div>
                    </div>        
                </div>
            </div>                        

        </div>
    </div>
    <!-- End Top Bar -->
        
    
    <!-- Start  Logo & Naviagtion  -->
    <div class="navbar navbar-default navbar-top">
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
                     @if (! Auth::check())
                     <li class="top-search">
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                    <input type="submit" value=" ">
                </form>
            </li>
                        <li>
                            <a class="active" href="/">Home</a>
                        </li>
                       
                        <li>
                            <a href="{{ route('register') }}">Sign Up</a>
                        </li>

                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
            
                    @else
                     
                    <!-- End Navigation List -->
                    <li class="top-search">
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                    <input type="submit" value=" ">
                </form>
            </li>
                        <li>
                            {{ Auth::user()->username }} <img src="{{ Auth::user()->avatar }}" class="img-circle" height="50" width="50" style="border-radius:25px;" />
                        </li>
                        <li></li>  
                        <li><a class="btn" href="{{ route('logout') }}">Logout</a>
                        <li><a class="btn" href="{{ route('dashboard.index') }}">Dashboard</a>
                        
                    
                        </ul>     
                    @endif
             
                <!--End Navigation List-->
            </div>
        </div>
    <!--End Header Logo & Naviagtion-->

</header>
