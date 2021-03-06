<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Our Courses</title>
  </head>
  <body>

    <!-- nav section -->
    <section class="nav-section">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <span style="color: #FF0000;" class="position-absolute top-10 start-20 translate-middle p-1">5</span>
                  </i>
                </a>
                <ul style=" left: inherit; right: 0px;" class="dropdown-menu" aria-labelledby="notification">
                  <span class="dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </ul>
              </li>
              <li class="nav-item dropdown">
                @if(Auth::check())
                  <a class="nav-link dropdown-toggle" href="#" id="account" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  My Account
                </a>
                <ul style=" left: inherit; right: 0px;" class="dropdown-menu" aria-labelledby="account">
                  <a href="{{ url('/logout') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Logout
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="javascript:void(0)" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                  </a>
                </ul>
                @else
                  <a class="nav-link" href="{{ url('/login')}}">
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


    <!-- content section -->
    <section class="content-section mt-5">
      <div class="container">

      <!-- Course A -->
        <div class="row text-center" id="course_a">
          <div class="col-sm-12">
            <h4>Course A Requirements</h4>
            <p>Laravel Crud Must Know- Have a PC && Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fas fa-envelope"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Email</h5>
              <p class="card-text"> Send Email To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fas fa-phone"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">SMS</h5>
              <p class="card-text">Send SMS To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-bell"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Notification</h5>
              <p class="card-text">Send Notification To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-facebook-f"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Social Login</h5>
              <p class="card-text">Facebook Github Twitter Google</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-tasks"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Task Scheduling</h5>
              <p class="card-text">Task Scheduling && Queue</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-users"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Multi Authentication</h5>
              <p class="card-text">Project Setup Mastering Authentication</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>


      <!-- Course B -->
        <div class="row text-center mt-5" id="course_b">
          <div class="col-sm-12">
            <h4>Course B Requirements</h4>
            <p>Laravel Basic Knowledge - Javascript Basic Knowledge - Have a PC && Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fas fa-envelope"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Email</h5>
              <p class="card-text"> Send Email To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fas fa-phone"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">SMS</h5>
              <p class="card-text">Send SMS To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-bell"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Notification</h5>
              <p class="card-text">Send Notification To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-facebook-f"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Social Login</h5>
              <p class="card-text">Facebook Github Twitter Google</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-tasks"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Task Scheduling</h5>
              <p class="card-text">Task Scheduling && Queue</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-users"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Multi Authentication</h5>
              <p class="card-text">Project Setup Mastering Authentication</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>


        <!-- Course C -->
        <div class="row text-center mt-5" id="course_c">
          <div class="col-sm-12">
            <h4>Course C Requirements</h4>
            <p>Laravel Basic Knowledge - Javascript Basic Knowledge - Have a PC && Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fas fa-envelope"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Email</h5>
              <p class="card-text"> Send Email To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fas fa-phone"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">SMS</h5>
              <p class="card-text">Send SMS To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-bell"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Notification</h5>
              <p class="card-text">Send Notification To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-facebook-f"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Social Login</h5>
              <p class="card-text">Facebook Github Twitter Google</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-tasks"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Task Scheduling</h5>
              <p class="card-text">Task Scheduling && Queue</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-users"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Multi Authentication</h5>
              <p class="card-text">Project Setup Mastering Authentication</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>


        <!-- Course D -->
        <div class="row text-center mt-5" id="course_d">
          <div class="col-sm-12">
            <h4>Course D Requirements</h4>
            <p>Laravel Basic Knowledge - Javascript Basic Knowledge - Have a PC && Internet Connection</p>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2> <i class="fas fa-envelope"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">Email</h5>
              <p class="card-text"> Send Email To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2> <i class="fas fa-phone"></i> </h2>
            <div class="card-body">
              <h5 class="card-title">SMS</h5>
              <p class="card-text">Send SMS To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-bell"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Notification</h5>
              <p class="card-text">Send Notification To User && Admin</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

        <div class="card-group mt-3 text-center">
          <div class="card">
            <h2><i class="fab fa-facebook-f"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Social Login</h5>
              <p class="card-text">Facebook Github Twitter Google</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-tasks"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Task Scheduling</h5>
              <p class="card-text">Task Scheduling && Queue</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
          <div class="card">
            <h2><i class="fas fa-users"></i></h2>
            <div class="card-body">
              <h5 class="card-title">Multi Authentication</h5>
              <p class="card-text">Project Setup Mastering Authentication</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Real Life Use in Live Server</small>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- content section end-->


    <!-- footer section -->
    <section class="footer-section mt-5" style="background: #F0F0F4;">
      <div class="container">
        <div class="row">
           <div class="col-sm-12">
            <p class="text-center mt-3">&copy; Web Journey</p>
            </div>
        </div>
      </div>
    </section>
    <!-- footer section end-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>