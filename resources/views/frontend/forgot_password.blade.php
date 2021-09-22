@extends('frontend.layout.app')

@section('title','Forgot Password')



@section('content')
 <!-- content section -->
  <section class="content-section mt-5">
    <div class="container">
          
      <div class="row">
      	<div class="col-sm-4"></div>
      	<div class="col-sm-4">
      		<div class="card my-5">

      			@if(Session::has('error-message'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error-message') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   </button>
                  </div>
                  @endif
                  @if(Session::has('success-message'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success-message') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                   </button>
                  </div>
                  @endif

		      	<div class="card-header">
		      		<h4>Forgot Password</h4>
		      	</div>

		      	<div class="card-body">
		      		<form action="{{url('/forgot-password')}}" method="post">
			           @csrf
			           <div class="form px-4 pt-5"> 
			           	<p>Enter your email to get new password</p>
			            <input type="text" name="email" class="form-control" placeholder="Email"> 
			            <button type="submit" class="btn btn-danger mt-5">Submit</button>
			           </div>
			        </form>
		      	</div>

		      </div>
      	</div>
      </div>

    </div>
  </section>
@endsection