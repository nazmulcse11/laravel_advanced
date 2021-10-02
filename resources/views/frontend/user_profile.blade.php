@extends('frontend.layout.app')

@section('title','Web Journey | Courses')

@section('content')
      <!-- content section -->
    <section class="content-section mt-5">
      <div class="container">

        <div class="row">

          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(Auth::user()->image)
                  <img style="width:100%" class="rounded-circle" src="{{ asset('frontend/images/profile/'.Auth::user()->image) }}" alt="User profile picture">
                  @else
                  <img style="width:100%" class="rounded-circle" src="{{ asset('frontend/images/profile/no_image.png') }}" alt="User profile picture">
                  @endif

                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">{{ Auth::user()->email }}</li>
                  <li class="list-group-item">{{ Auth::user()->mobile }}</li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

          <div class="col-md-9">
          	@if(Session::has('success_message'))
	          <div class="alert alert-success alert-dismissible fade show " role="alert">
	          {{ Session::get('success_message') }}
	          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
	          </button>
	        </div>
	        @endif
	        @if(Session::has('error_message'))
	          <div class="alert alert-danger alert-dismissible fade show " role="alert">
	          {{ Session::get('error_message') }}
	          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        @endif
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#UpdateProfile" data-bs-toggle="tab">Update Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#UpdatePassword" data-bs-toggle="tab">Update Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="UpdateProfile">

                    <form class="form-horizontal" method="post" action="{{ url('/update-user-details')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email">
                          @error('email')
	                        <span class="text-danger">{{ $message }}</span>
	                       @enderror
                        </div>
                        
                      </div>
                      <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Name">
                          @error('name')
	                        <span class="text-danger">{{ $message }}</span>
	                      @enderror
                        </div>
                      </div>
                      <div class="form-group row mt-3">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" name="mobile" value="{{ Auth::user()->mobile }}" class="form-control" placeholder="Mobile">
                          @error('mobile')
	                        <span class="text-danger">{{ $message }}</span>
	                       @enderror
                        </div>
                      </div>
                      <div class="form-group row mt-3">
                        <label for="image" class="col-sm-2 col-form-label">P.Image</label>
                        <div class="col-sm-10">
                          <input type="file" name="image" class="form-control">
                          @error('image')
                          <span class="text-danger">{{ $message }}</span>
                         @enderror
                        </div>
                      </div>
                      <div class="form-group row mt-5 mb-4">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                   <div class="tab-pane" id="UpdatePassword">
                    <form class="form-horizontal" method="post" action="{{ url('/update-current-password') }}">
                    	@csrf
                      <div class="form-group row">
                        <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                          <span id="checkCurrentPassword"></span>
                        </div>
                      </div>
                      <div class="form-group row mt-3">
                        <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row mt-3">
                        <label for="confirm_new_password" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password">
                        </div>
                      </div>
                      <div class="form-group row my-5">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger">Update Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div>
    </section>
    <!-- content section end-->
@endsection