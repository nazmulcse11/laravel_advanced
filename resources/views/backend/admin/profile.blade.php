@extends('backend.layout.app')

@section('title','Profile')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="row">

          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend/images/profile/'.Auth::guard('admin')->user()->image) }}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        @endif
	        @if(Session::has('error_message'))
	          <div class="alert alert-danger alert-dismissible fade show " role="alert">
	          {{ Session::get('error_message') }}
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        @endif
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#UpdateProfile" data-toggle="tab">Update Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#UpdatePassword" data-toggle="tab">Update Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="UpdateProfile">

                    <form class="form-horizontal" method="post" action="{{ url('admin/update-admin-details')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ Auth::guard('admin')->user()->email }}" class="form-control" placeholder="Email">
                          @error('email')
	                        <span class="text-danger">{{ $message }}</span>
	                      @enderror
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" placeholder="Name">
                          @error('name')
	                        <span class="text-danger">{{ $message }}</span>
	                      @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" name="mobile" value="{{ Auth::guard('admin')->user()->mobile }}" class="form-control" placeholder="Mobile">
                          @error('mobile')
	                        <span class="text-danger">{{ $message }}</span>
	                      @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">P.Image</label>
                        <div class="col-sm-10">
                          <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                   <div class="tab-pane" id="UpdatePassword">
                    <form class="form-horizontal" method="post" action="{{ url('admin/update-current-password') }}">
                    	@csrf
                      <div class="form-group row">
                        <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                          <span id="checkCurrentPassword"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirm_new_password" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password">
                        </div>
                      </div>
                      <div class="form-group row">
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

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

