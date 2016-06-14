<header class="clearfix" style="background-color: #f5f5f5;">
    <!-- Start  Logo & Naviagtion  -->
    <div class="navbar navbar-default navbar-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand text-default" style="margin-top: 8px;" href="/">Desire2Learn</a>
            </div>
            <div class="navbar-collapse collapse">
                
                <!-- Start Navigation List -->
                <ul class="nav navbar-nav navbar-right">
                    @if (! Auth::check())
                    
                    <li>
                        <a class="nav-top" href="{{ route('login') }}">Sign In</a>
                    </li>

                    <li>
                        <a type="button" class="page-scroll btn btn-primary btn-topnav" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    
                    @else
                    
                    <!-- End Navigation List -->
                    <li id="dropdown" style="margin-top: -1%; color: #6b6b6b;">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"> {{ Auth::user()->username }} <img src="{{ Auth::user()->avatar }}" class="img-circle" height="50" width="50" style="border-radius:25px;" />
                            
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 20%;">
                            <li>
                                <a href="{{ route('edit-profile') }}">
                                    <i class="fa fa-btn fa-user"></i> {{ ucwords(Auth::user()->username) }}'s profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changepassword') }}">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a class="dropdown-item" href="{{ route('dashboard.home') }}"> <i class="fa fa-btn fa-dashboard" style="margin: 0 0.5em 0 0;"></i>Dashboard</a>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" > <i class="fa fa-btn fa-power-off" style="margin: 0 0.5em 0 0;"></i>Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                @endif
                <!--End Navigation List-->
            </div>
        </div>
        <!--End Header Logo & Naviagtion-->
    </header>
    