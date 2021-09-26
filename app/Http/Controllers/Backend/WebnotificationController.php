<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webnotification;
use App\Notifications\UserWebNotification;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Sms;
use DB;
use Validator;
use Toastr;

class WebnotificationController extends Controller
{
    public function webnotification(){
        $notifications = webnotification::latest()->get();
        return view('backend.webnotification.webnotification',compact('notifications'));
    }
    

    //add edit notification
    public function addEditNotification(Request $request, $id=null){
        if($id==''){
                $notification = new Webnotification();
                $title = 'Add Notification';
                $message = 'Notification Successfully Added';
            }else{
                $notification = Webnotification::findOrFail($id);
                $title = 'Edit Notification';
                $message = 'Notification Successfully Updated';
            }

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
            
            
            $notification->title = $data['title'];
            $notification->course = $data['course'];
            $notification->save();
            
            if($id==''){
                $notificationID = DB::getPdo()->lastInsertId();
                $latestNotification = Webnotification::select('id','title','course')->where('id',$notificationID)->first();

            
                //Send notification to user using database notification
                $users = User::all();
                foreach($users as $user){
                $user->notify(new UserWebNotification($latestNotification->id,$latestNotification->title,$latestNotification->course));
                }

                
                // send email to user using email notification
                foreach($users as $user){
                Notification::send($user, new TaskNotification($latestNotification->title));
                }

                //send sms to user mobile using sms api
                 // $mobile =  $data['mobile'];
                 // $message = "Test SMS From Using API";
                //  foreach($users as $user){
                //  Sms::sendSms($user->mobile, $latestNotification->title);
                // }
            }
        
            Toastr::success($message, "Success", ["positionClass" => "toast-top-right","closeButton"=> "true"]);
            return redirect('admin/webnotification');
        }
        return view('backend.webnotification.add_edit_notification',compact('title','notification'));
    }

    // delete deleteWebnotification
    public function deleteWebnotification($id){
        Webnotification::findOrFail($id)->delete();
        DB::table('notifications')->where('data->web_id', $id)->delete();
        return redirect()->back();
    }

}
