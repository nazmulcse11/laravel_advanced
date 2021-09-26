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
            <h1 class="m-0">Web Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Notification</li>
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
                	<a href="{{ url('/admin/add-edit-notification') }}" class="btn btn-primary btn-sm">Add Notification</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>course</th>
                    <th>Create_at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($notifications as $key=> $notifi)
                    <tr>
                    	<td>{{ $key+1 }}</td>
                      <td>{{ $notifi['title'] }}</td>
                      <td>{{ $notifi['course'] }}</td>
                      <td>
                        {{ $notifi['created_at']->toDateString() }} <br>
                       <!--  {{ $notifi['created_at']->toFormattedDateString() }} <br>
                        {{ $notifi->created_at->toDayDateTimeString() }} <br>
                        {{ \Carbon\Carbon::parse($notifi->created_at)->format('Y/m/d')}} <br>
                        {{ \Carbon\Carbon::parse($notifi->created_at)->format('d/m/Y')}} <br> -->
                      </td>
                      <td>
                        <a href="{{ url('admin/add-edit-notification/'.$notifi['id'] ) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a record="record" recordid="{{ $notifi['id'] }}" class="btn btn-sm btn-danger confirmDelete"><i class="fas fa-times"></i></a>
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