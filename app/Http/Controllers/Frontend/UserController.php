<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Session;
use Validator;


class UserController extends Controller
{
    public function loginRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['email'] , 'password'=>$data['password']])){
                return redirect('/');
            }else{
                Session::flash('error-message','Invalid Email or password');
                return redirect()->back();
            }
        }
        return view('frontend.login_register');
    }

    // register user 
    public function userRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'mobile'=>'required',
                'password'=>'required',
                'confirm_password'=>'required',
            ];
            $cm = [
                'name.required'=>'Name is required',
                'email.required'=>'Email is required',
                'email.email'=>'Email must be a valid email',
                'email.exists'=>'Email already exists',
                'mobile.required'=>'Mobile number is required',
                'password.required'=>'Password is required',
                'confirm_password.required'=>'Confirm Password is required',
            ];
            $this->validate($request,$rules,$cm);

            if($data['password'] == $data['confirm_password']){
                $user = new User();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->mobile = $data['mobile'];
                $user->password = hash::make($data['password']);
                $user->save();
                Auth::login($user);
                return redirect('/');
            }else{
              Session::flash('error-message','Password && confirm password does not match');
              return redirect()->back();
            }
        }
        return view('frontend.login_register');
    }

    //user logout
    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }
}
