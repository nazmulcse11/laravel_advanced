<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\UserWebNotification;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Course;
use App\Models\User;
use App\Models\Sms;
use DB;
use Validator;
use Toastr;

class CourseController extends Controller
{
    public function course(){
        $courses = Course::latest()->get();
        return view('backend.course.course',compact('courses'));
    }
    

    //add edit notification
    public function addEditCourse(Request $request, $id=null){
        if($id==''){
                $course = new Course();
                $title = 'Add Course';
                $message = 'Course Successfully Added';
            }else{
                $course = Course::findOrFail($id);
                $title = 'Edit Course';
                $message = 'Course Successfully Updated';
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
            
            
            $course->title = $data['title'];
            $course->course = $data['course'];
            $course->save();
            
            if($id==''){
                $courseID = DB::getPdo()->lastInsertId();
                $latestCourse = Course::select('id','title','course')->where('id',$courseID)->first();

            
                //Send course notification to user interface
                $users = User::all();
                foreach($users as $user){
                $user->notify(new UserWebNotification($latestCourse->id,$latestCourse->title,$latestCourse->course));
                }

                
                // send course email to user 
                foreach($users as $user){
                Notification::send($user, new TaskNotification($latestCourse->title));
                }

                //send sms to user mobile using sms api
                 // $mobile =  $data['mobile'];
                 // $message = "Test SMS From Using API";
                //  foreach($users as $user){
                //  Sms::sendSms($user->mobile, $latestCourse->title);
                // }
            }
        
            Toastr::success($message, "Success", ["positionClass" => "toast-top-right","closeButton"=> "true"]);
            return redirect('admin/course');
        }
        return view('backend.course.add_edit_course',compact('title','course'));
    }

    // delete deleteWebnotification with notifications
    public function deleteCourse($id){
        Course::findOrFail($id)->delete();
        DB::table('notifications')->where('data->course_id', $id)->delete();
        $message = "Course Successfully Deleted";
        Toastr::success($message, "Success", ["positionClass" => "toast-top-right","closeButton"=> "true"]);
        return redirect()->back();
    }

}
