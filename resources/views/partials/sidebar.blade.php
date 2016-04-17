<aside class="main-sidebar">
  <section class="sidebar">
    @section('sidebar-user-panel')
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ $userDisplayName or '' }}</p>
          @section('sidebar-user-panel-status')<a href="#"><i class="fa fa-circle text-success"></i> Online</a>@show
        </div>
      </div>
    @show
    @section('sidebar-search-form')
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
    @show
    <ul class="sidebar-menu">
      @yield('sidebar-menu')
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>