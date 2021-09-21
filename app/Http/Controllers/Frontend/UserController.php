<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Auth;
use Session;
use Validator;
use File;
use Socialite;
use Exception;


class UserController extends Controller
{
    public function loginRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'email'=>'required',
                'password'=>'required',
            ];
            $cm = [
                'email.required'=>'Email or Mobile is required',
                'password.required'=>'Password is required',
            ];
            $this->validate($request,$rules,$cm);

            
            if(Auth::attempt(['email'=>$data['email'] , 'password'=>$data['password']])){
                return redirect('/');
            }else if(Auth::attempt(['mobile'=>$data['email'] , 'password'=>$data['password']])){
                return redirect('/');
              }
            else{
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

    //user profile
    public function userProfile(){
        return view('frontend.user_profile');
    }


    // Update user details
    public function updateUserDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $profileImage = Auth::user()->image;
            $user_id = Auth::user()->id;

            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|unique:users,email,'.$user_id,
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
                $deleteOldProfileImg = 'frontend/images/profile/'.$profileImage;
                if(file_exists($deleteOldProfileImg)){
                    File::delete($deleteOldProfileImg);
                }
                //save image after resize
                $profileImgPath = 'frontend/images/profile/'.$imageName;
                Image::make($image)->resize(200,200)->save($profileImgPath);
            }else{
                if(isset($profileImage)){
                    $imageName = Auth::user()->image;
                }else{
                    $imageName = '';
                }
            } 

            User::where('id',Auth::user()->id)
            ->update([
                'email'=>$data['email'],
                'name'=>$data['name'],
                'mobile'=>$data['mobile'],
                'image'=>$imageName
            ]);
            session::flash('success_message','Profile Details Successfully Updated');
            return redirect()->back();
        }
    }


    // Check current password is wrong or right
    public function checkCurrentPassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if(Hash::check($data['current_password'], Auth::user()->password)){
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
            User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_password'])]);
            session::flash('success_message','Password Successfully Updated');
            return redirect()->back();    
            }else{
                session::flash('error_message','New && Confirm New Password Not Match');
                return redirect()->back(); 
            }
        }
    }

    


    //facebook login and redirect
    public function redirectToFacebook(){
      return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(){
      $user = Socialite::driver('facebook')->stateless()->user();
      $finduser = User::where('fb_id', $user->id)->orWhere('email', $user->email)->first();

      if($finduser){
          Auth::login($finduser);
          return redirect('/user-profile');

      }else{
          $newUser = new User();
          $newUser->name      = $user->name;
          $newUser->email     = $user->email;
          $newUser->fb_id = $user->id;
          $newUser->password  = bcrypt('12345678');
          $newUser->save();
          Auth::login($newUser);
          return redirect('/user-profile');
      }
    }


  //Login with google
  public function redirectToGoogle(){
    return Socialite::driver('google')->redirect();
  }
  
  public function loginWithGoogle(Request $request){
      $user = Socialite::driver('google')->stateless()->user();
      $finduser = User::where('go_id', $user->id)->first();

      if($finduser){
          Auth::login($finduser);
          return redirect('/user-profile');

      }else{
            $newUser = new User();
            $newUser->name      = $user->name;
            $newUser->email     = $user->email;
            $newUser->go_id     = $user->id;
            $newUser->password  = bcrypt('12345678');
            $newUser->save();
            Auth::login($newUser);
            return redirect('/user-profile');
        }
    }


  //Login with google
  public function redirectToGithub(){
    return Socialite::driver('github')->redirect();
  }
  
  public function loginWithGithub(Request $request){
      $user = Socialite::driver('github')->stateless()->user();
      $finduser = User::where('gi_id', $user->id)->first();

      if($finduser){
          Auth::login($finduser);
          return redirect('/user-profile');

      }else{
            $newUser = new User();
            $newUser->name      = $user->name;
            $newUser->email     = $user->email;
            $newUser->gi_id     = $user->id;
            $newUser->password  = bcrypt('12345678');
            $newUser->save();
            Auth::login($newUser);
            return redirect('/user-profile');
        }
    }
}
