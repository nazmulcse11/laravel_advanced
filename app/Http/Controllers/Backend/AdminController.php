<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Validator;

class AdminController extends Controller
{
    // Login page and login functionality
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules =[
               'email'=>'required|exists:admins',
               'password'=>'required',
            ];
            $customMessage = [
                'email.required'=>'Email is required',
                'email.exists'=>'Email does not exists',
                'password.required'=>'Password is required',
            ];
            $this->validate($request, $rules, $customMessage);


            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                Session::flash('error-message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('backend.admin.login');
    }

    //Admin Logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
