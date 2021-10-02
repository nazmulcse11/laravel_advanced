<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Toastr;


class UserController extends Controller
{
    public function user(){
        $users = User::latest()->get();
        return view('backend.user.user',compact('users'));
    }

    // delete delete user
    public function deleteUser($id){

        $user = User::findOrFail($id);
        $message = 'User Successfully Deleted';
        //delete profile image
        $deleteProfileImg = 'frontend/images/profile/'.$user->image;
        if(file_exists($deleteProfileImg)){
            File::delete($deleteProfileImg);
        }
        $user->delete();

        Toastr::success($message, "Success", ["positionClass" => "toast-top-right","closeButton"=> "true"]);
        return redirect()->back();
    }
}
