<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enroll;
use Validator;
use Auth;

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
                'mobile' => 'required|max:11',
                'course' => 'required',
            ]);

            $enroll = new Enroll();
            $enroll->name =   $data['name'];
            $enroll->mobile = $data['mobile'];
            $enroll->course = $data['course'];
            $enroll->status = '0';
            $enroll->save();
            return response()->json(['status'=>'true',]);
        }   
    }

    //Mark as read
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect('/');
    }
}
