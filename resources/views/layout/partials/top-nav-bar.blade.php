<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a href="/"><img src="{{ URL::asset('images/logo.png') }}" class="img-responsive logo" /></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li id="menu-signup"><a href="{{ route('auth.register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li id="menu-login"><a href="{{ route('auth.login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><span class="glyphicon glyphicon-search" aria-hidden="true"></span></li>
    </ul>
  </div>
</nav>