<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enroll;

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
        return redirect()->back();

    }
}
