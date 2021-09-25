<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webnotification;
use App\Notifications\UserWebNotification;
use App\Models\User;
use DB;
use Validator;

class WebnotificationController extends Controller
{
    public function webnotification(){
        $notifications = webnotification::latest()->get();
        return view('backend.webnotification.webnotification',compact('notifications'));
    }
    

    //add edit notification
    public function addEditNotification(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

             $rules =[
               'title'=>'required|max:100',
               'course'=>'required|max:250',
            ];
            $customMessage = [
                'title.required'=>'Title is required',
                'course.required'=>'Course is required',
            ];
            $this->validate($request, $rules, $customMessage);

            $notification = new webnotification();
            $notification->title = $data['title'];
            $notification->course = $data['course'];
            $notification->save();

            $notificationID = DB::getPdo()->lastInsertId();
            $latestNotification = webnotification::select('title','course')->where('id',$notificationID)->first();
            
            //Send database and email notification for multiple user
            $users = User::all();
            foreach($users as $user){
            $user->notify(new UserWebNotification($latestNotification->title,$latestNotification->course));
            }
            return redirect('admin/webnotification');
        }
        return view('backend.webnotification.add_edit_notification');
    }

    // delete deleteWebnotification
    public function deleteWebnotification($id){
        webnotification::findOrFail($id)->delete();
        return redirect()->back();
    }

}
