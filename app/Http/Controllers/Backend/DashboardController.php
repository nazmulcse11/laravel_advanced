<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enroll;
use Toastr;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $enrolls = Enroll::latest()->get();
        return view('backend.dashboard.dashboard',compact('enrolls'));
    }

    public function enrollStatus(Request $request, $id){
        $student = Enroll::select('status')->where('id',$id)->first();
        if($student->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        Enroll::where('id',$id)->update(['status'=>$status]);
        Toastr::success('Status Successfully Updated', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true"]);
        return redirect()->back();

    }

    // delete delete enroll with notification
    public function deleteEnroll($id){
        Enroll::findOrFail($id)->delete();
        DB::table('notifications')->where('data->enroll_id', $id)->delete();
        $message = "Enroll Successfully Deleted";
        Toastr::success($message, "Success", ["positionClass" => "toast-top-right","closeButton"=> "true"]);
        return redirect()->back();
    }

    //Mark as read
    public function markAsRead(){
        Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

}
