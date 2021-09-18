<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Auth;
use Session;
use Validator;
use File;

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


    //Profile Page
    public function profile(){
        return view('backend.admin.profile');
    }


     // Update admin details
    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $profileImage = Auth::guard('admin')->user()->image;
            $admin_id = Auth::guard('admin')->user()->id;

            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|unique:admins,email,'.$admin_id,
            ];
            $customMessage = [
                'name.required' => 'Name is required',
                'name.regex' => 'Valid name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
            ];
            $this->validate($request, $rules, $customMessage);
            
            $image = $request->file('image');  
            if(isset($image)){
                // create image name
                $imageName = rand(111,99999).'-'.uniqid().'.'.$image->getClientOriginalExtension();
                //delete old profile image
                $deleteOldProfileImg = 'backend/images/profile/'.$profileImage;
                if(file_exists($deleteOldProfileImg)){
                    File::delete($deleteOldProfileImg);
                }
                //save image after resize
                $profileImgPath = 'backend/images/profile/'.$imageName;
                Image::make($image)->resize(200,200)->save($profileImgPath);
            }else{
                if(isset($profileImage)){
                    $imageName = Auth::guard('admin')->user()->image;
                }else{
                    $imageName = '';
                }
                
            } 

            Admin::where('id',Auth::guard('admin')->user()->id)
            ->update([
                'email'=>$data['email'],
                'name'=>$data['name'],
                'mobile'=>$data['mobile'],
                'image'=>$imageName
            ]);
            session::flash('success_message','Admin Details Successfully Updated');
            return redirect()->back();
        }
    }

    // Check current password is wrong or right
    public function checkCurrentPassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
                return 'true';
            }else{
                return 'false';
            }
        }
        
    }

    // Update Password
    public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
             $rules = [
                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_new_password' => 'required'
            ];
            $custom_message = [
              'current_password.required' => 'Current password is required',
              'new_password.required' => 'New password is required',
              'confirm_new_password.required' => 'Confirm password is required'
            ];
            $this->validate($request,$rules,$custom_message);

            if($data['new_password'] == $data['confirm_new_password']){
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
            session::flash('success_message','Password Successfully Updated');
            return redirect()->back();    
            }else{
                session::flash('error_message','New && Confirm New Password Not Match');
                return redirect()->back(); 
            }
        }
    }
}
