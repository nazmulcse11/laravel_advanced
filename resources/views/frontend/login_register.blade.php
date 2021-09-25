@extends('frontend.layout.app')

@section('title','Login | Register')

<style type="text/css">
.fa-bell{margin-top: 5px;}
.card {background-color: #F0F0F4;width: 400px;border: none}
.btr {border-top-right-radius: 5px !important}
.btl {border-top-left-radius: 5px !important}
.btn-dark {color: #fff;background-color: #0d6efd;border-color: #0d6efd}
.btn-dark:hover {color: #fff;background-color: #0d6efd;border-color: #0d6efd}
.nav-pills {display: table !important;width: 100%}
.nav-pills .nav-link-cus { border-radius: 0px;border-bottom: 1px solid #0d6efd40}
.nav-item-cus {display: table-cell;background: #0d6efd2e}
.form {padding: 10px;height: 300px}
.form input {margin-bottom: 12px;border-radius: 3px}
.form input:focus {box-shadow: none}
.form button {margin-top: 10px}
</style>

@section('content')
 <!-- content section -->
  <section class="content-section mt-5">
    <div class="container">
          
      <div class="d-flex justify-content-center align-items-center">
         <div class="card my-4">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item nav-item-cus text-center"> 
                  <a class="nav-link active btl" id="pills-home-tab" data-bs-toggle="pill" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item nav-item-cus text-center"> 
                  <a class="nav-link btr" id="pills-profile-tab" data-bs-toggle="pill" href="#register" role="tab" aria-controls="register" aria-selected="false">Signup</a> 
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="pills-home-tab">

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

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <form action="{{url('/login-register')}}" method="post">
                    @csrf
                    <div class="form px-4 pt-5"> 
                      <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email or Phone"> 
                      <input type="password" name="password" class="form-control" placeholder="Password"> 
                      <button type="submit" class="btn btn-danger">Login</button>&nbsp;&nbsp;
                      <span>Forgot Password  <a href="{{ url('forgot-password') }}">Reset Here</a></span>
                      
                      <p class="mt-4 mb-0">Login With</p>
                      <a href="{{ url('login/facebook') }}" class="btn btn-danger btn-sm"><i class="fab fa-facebook-f"></i></a> 
                      <a href="{{ url('login/google') }}" class="btn btn-danger btn-sm"><i class="fab fa-google"></i></a> 
                      <a href="{{ url('login/github') }}" class="btn btn-danger btn-sm"><i class="fab fa-github"></i></a> 

                    </div>
                  </form>

                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="pills-profile-tab">

                  <form action="{{url('/user-register')}}" method="post">
                    @csrf
                    <div class="form px-4"> 
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                      <input type="email" name="email"  value="{{ old('email') }}"  class="form-control" placeholder="Email"> 
                      <input type="text" name="mobile"  value="{{ old('mobile') }}"  class="form-control" placeholder="Mobile"> 
                      <input type="password" name="password" class="form-control" placeholder="Password"> 
                      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"> 
                      <button type="submit" class="btn btn-danger btn-block">Signup</button> 
                    </div>
                  </form>

                </div>
            </div>

         </div>
       </div>

    </div>
  </section>
@endsection