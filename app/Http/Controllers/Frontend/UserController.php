<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
// use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
                $userStatus = User::where('email',$data['email'])->first();
                   if($userStatus->status==0){
                    Auth::logout();
                    $message = 'Your account is not activated yet.Please confirm your email to activate';
                    Session::flash('error-message',$message);
                    return redirect()->back();
                   }
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
                $user->status = 0;
                $user->password = hash::make($data['password']);
                $user->save();

                 //Send confirmation email
                $email = $data['email'];
                $messageData = [
                  'email' => $data['email'],
                  'name' => $data['name'],
                  'code' => base64_encode($data['email'])
                ];
                Mail::send('email.account_confirmation',$messageData,function($message) use($email){
                  $message->to($email)->subject('Confirm your account');
                });

                //redirect back with success message
                $message = 'Please confirm your email to active your account';
                Session::flash('success-message',$message);
                return redirect()->back();


                Auth::login($user);
                return redirect('/');
            }else{
              Session::flash('error-message','Password && confirm password does not match');
              return redirect()->back();
            }
        }
        return view('frontend.login_register');
    }


    // confirm user account
    public function confirmAccount($email){
      $email = base64_decode($email);
      $userCount = User::where('email',$email)->count();

      if($userCount > 0){
        // check user email is alerady activated or not
        $userDetails = User::where('email',$email)->first();

        if($userDetails->status == 1){
          $message = 'Your email account is already activated. Please login';
          Session::flash('error-message',$message);
          return redirect('login-register');
        }else{
          User::where('email',$email)->update(['status'=>1]);

          //Send register email
          $messageData = [
            'name'=>$userDetails['name'],
            'mobile'=>$userDetails['mobile'],
            'email'=>$email
        ];

          Mail::send('email.account_info',$messageData,function($message) use($email){
            $message->to($email)->subject('Welcome to Web Journey');
          });    

          $message = 'Your email account is activated. You can login now';
          Session::flash('success-message',$message); 
          return redirect('login-register');
        }
      }
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

    


    //login with facebook
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


  //Login with github
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

    //forgot Password
    public function forgotPassword(Request $request){
         if($request->isMethod('post')){
            $data = $request->all();
            $emailCount = User::where('email',$data['email'])->count();

            if($data['email'] == ''){
              $message = 'Please enter your email';
              Session::flash('error-message',$message);
              return redirect()->back();
            }

            if($emailCount == 0){
              $message = 'Email not exists ! Please enter valid email';
              Session::flash('error-message',$message);
              return redirect()->back();
            }

            // Generate new random password
            $random_password = Str::random(6);

            //Encode/secure password
            $new_password = bcrypt($random_password);
            
            // Update password
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            
            // Get user name
            $userName = User::select('name')->where('email',$data['email'])->first();

            $email = $data['email'];
            $name = $userName['name'];
            $messageData = [
              'email'=>$email,
              'name'=>$name,
              'password'=>$random_password
            ];

            Mail::send('email.new_password',$messageData,function($message) use($email){
                $message->to($email)->subject('Your new password for Web Journey');
              }); 

             $message = 'Please check email for new password';
             Session::flash('success-message',$message);
             return redirect()->back();
        }

        return view('frontend.forgot_password');
    }

}
