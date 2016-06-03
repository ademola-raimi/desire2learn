<header class="clearfix">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        
        
        <!-- End Top Bar -->
        <div class="container" style="margin-top: -13%">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand text-default" style="margin-top: 60%;" href="/">Desire2Learn</a>
            </div>
            <div class="navbar-collapse collapse" stylle="margin-top: 10%;">
                
                <!-- Start Navigation List -->
                
                <ul class="nav navbar-nav navbar-right">
                    <!-- End Navigation List -->

                    <li class="dropdown" style="margin-top: 100%;">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> {{ Auth::user()->username }} <img src="{{ Auth::user()->avatar }}" class="img-circle" style="width: 45px; height: 45px;" />
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 20%;">
                    <li>
                        <a href="{{ route('edit-profile') }}">
                            <i class="fa fa-btn fa-user"></i> {{ ucwords(Auth::user()->username) }}'s profile
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('dashboard.home') }}"> <i class="fa fa-btn fa-dashboard"></i>Dashboard</a>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" > <i class="fa fa-btn fa-power-off"></i>Logout</a></li>
                         
                    </ul>
                    </li>
                    
                    
                    
                    
                </ul>
                
                <!--End Navigation List-->
            </div>
        </div>
    </nav>
</header>