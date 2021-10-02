<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\AdminWebNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Enroll;
use App\Models\Admin;
use Validator;
use Auth;
use DB;


class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function enrollForCourse(Request $request){
        if($request->ajax()){
            $data = $request->all();

            // $rules = [
            //     'name' => 'required|regex:/^[\pL\s\-]+$/u',
            //     'mobile' => 'required|number',
            //     'course' => 'required',
            // ];
            // $customMessage = [
            //     'name.required' => 'Name is required',
            //     'name.regex' => 'Valid name is required',
            //     'mobile.required' => 'Mobile number is required',
            //     'mobile.number' => 'Only number accepted',
            //     'course.required' => 'Course is required',
            // ];
            // $this->validate($request, $rules, $customMessage);

             $request->validate([
                'name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
                'course' => 'required',
            ]);

            $enroll = new Enroll();
            $enroll->name =   $data['name'];
            $enroll->mobile = $data['mobile'];
            $enroll->course = $data['course'];
            $enroll->status = '0';
            $enroll->save();

            $notificationID = DB::getPdo()->lastInsertId();
            $latestNotification = Enroll::select('id','name','mobile','course')->where('id',$notificationID)->first();


            
            // //Send notification to admin using database notification
            $admins = Admin::all();
            foreach($admins as $admin){
            $admin->notify(new AdminWebNotification($latestNotification->id,$latestNotification->name,$latestNotification->mobile,$latestNotification->course));
            }

            return response()->json(['status'=>'true',]);
        }   
    }

    //Mark as read
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect('/');
    }
}
