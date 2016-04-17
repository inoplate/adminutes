<header class="main-header">
  <!-- Logo -->
  <a href="{{ $baseurl or url('/') }}" class="logo">
    <span class="logo-mini">@section('site-title-mini') <b>A</b>DM @show</span>
    <span class="logo-lg">@section('site-title') Adminutes @show</span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @yield('navbar-custom-menu')
        @section('navbar-user-menu')
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ $userAvatar or '/vendor/inoplate-adminutes/img/user-64x64.png' }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ $userDisplayName or ''}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ $cardAvatar or '/vendor/inoplate-adminutes/img/user-128x128.png' }}" class="img-circle" alt="User Image">

                <p>
                  {{ $userDisplayName or ''}} - {{ $userDisplayType or ''}}
                  @section('navbar-user-menu-addtional-detail')<small>&nbsp;</small>@show
                </p>
              </li>
              <li class="user-body">
                @yield('navbar-user-menu-body')
              </li>
              <li class="user-footer">
                @section('navbar-user-menu-footer')
                  <div class="pull-left">
                    <a href="{{ $userProfileUrl or '#' }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ $userSignoutUrl or '#' }}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                @show
              </li>
            </ul>
          </li>
        @show
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>