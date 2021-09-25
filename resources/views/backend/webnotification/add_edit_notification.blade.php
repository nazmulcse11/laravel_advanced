@extends('backend.layout.app')

@section('title','Add Edit Notification')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Edit Notification</li>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a href="" class="btn btn-primary btn-sm">Add Notification</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<form class="form-horizontal" method="post" action="{{ url('admin/add-edit-notification')}}">
                @csrf
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Notification</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" value="" class="form-control" placeholder="Notification">
                      @error('title')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="course" class="col-sm-2 col-form-label">Select Course</label>
                    <div class="col-sm-10">
                      <select  name="course" value="" class="form-control">
                      	<option value="">Select Course</option>
                      	<option value="course_a">Course A</option>
                      	<option value="course_b">Course B</option>
                      	<option value="course_c">Course C</option>
                      	<option value="course_d">Course D</option>
                      </select>
                       @error('course')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Add Notification</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection