<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    // Login page and login functionality
    public function login(Request $request){
        if($request->isMethod('post')){
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect('admin/dashboard');
            }else{
                Session::flash('error-message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('backend.admin.login');
    }
}
