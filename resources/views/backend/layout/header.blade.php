<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="Javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Javascript:void(0)" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="Javascript:void(0)" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            {{ Auth::guard('admin')->user()->unreadNotifications->count() }}
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('admin/mark-as-read') }}" class="dropdown-item">Mark As Read</a>
          <div class="dropdown-divider"></div>
            @foreach(Auth::guard('admin')->user()->unreadNotifications as $notification)
              <span class="dropdown-item bg-danger text-white">
               {{ $notification->data['name'] }} &nbsp {{ $notification->data['course'] }} &nbsp {{ $notification->data['mobile'] }} 
            </span>
            @endforeach

            @foreach(Auth::guard('admin')->user()->readNotifications as $notification)
              <span class="dropdown-item">
               {{ $notification->data['name'] }} &nbsp {{ $notification->data['course'] }} &nbsp {{ $notification->data['mobile'] }} 
            </span>
            @endforeach
          <div class="dropdown-divider"></div>
          <a href="Javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->