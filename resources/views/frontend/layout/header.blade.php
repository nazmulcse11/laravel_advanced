<!-- nav section -->
    <section class="nav-section">
      <nav class="navbar navbar-expand-md navbar-light bg-light" id="navbar_top">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#course_a">Course A</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#course_b">Course B</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#course_c">Course C</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#course_d">Course D</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#enroll">Enroll</a>
              </li>
            </ul>
            <ul class="navbar-nav pull-right">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="notification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-bell">
                    <span style="color: #FF0000;" class="position-absolute top-10 start-20 translate-middle p-1">
                      @if(Auth::check())
                       {{ Auth::user()->unreadNotifications->count() }}
                       @endif
                    </span>
                  </i>
                </a>
                <ul style=" left: inherit; right: 0px;" class="dropdown-menu" aria-labelledby="notification">
                  <a href="{{ url('mark-as-read') }}" class="dropdown-item">Mark As Read</a>
                  <div class="dropdown-divider"></div>
                  @if(Auth::check())
                    @foreach(Auth::user()->unreadNotifications as $notification)
                      <a href="{{ url('#'.$notification->data['course']) }}" class="dropdown-item bg-danger text-white">
                       {{ $notification->data['title'] }}
                    </a>
                    @endforeach
                  @endif

                  @if(Auth::check()) 
                    @foreach(Auth::user()->readNotifications as $notification)
                      <a href="{{ url('#'.$notification->data['course']) }}" class="dropdown-item">
                      {{ $notification->data['title'] }}
                    </a>
                    @endforeach
                  @endif
                  <div class="dropdown-divider"></div>
                  <a href="Javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
                </ul>
              </li>
              <li class="nav-item dropdown">
                @if(Auth::check())
                  <a class="nav-link dropdown-toggle" href="#" id="account" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  My Account
                </a>
                <ul style=" left: inherit; right: 0px;" class="dropdown-menu" aria-labelledby="account">
                  <a href="{{ url('/user-logout') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Logout
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ url('/user-profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                  </a>
                </ul>
                @else
                  <a class="nav-link" href="{{ url('/login-register')}}">
                  Log/Reg
                </a>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <!-- nav section end -->