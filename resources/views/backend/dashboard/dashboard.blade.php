@extends('backend.layout.app')

@section('title','Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashhboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h3 class="card-title">Enrolls</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Course</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($enrolls as $key=>$enroll)
                    <tr>
                      <td>{{ $key+1; }}</td>
                      <td>{{ $enroll['name'] }}</td>
                      <td>{{ $enroll['mobile'] }}</td>
                      <td>{{ $enroll['course'] }}</td>
                      <td>
                        @if($enroll['status'] == 0)
                        <a href="{{ url('admin/change-enroll-status/'.$enroll->id) }}" class="btn btn-sm btn-danger">Pending</a>
                        @else
                        <a href="{{ url('admin/change-enroll-status/'.$enroll->id) }}" class="btn btn-sm btn-success">Active</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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