<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminEmployee;

class AdminEmployeeController extends Controller
{
    public function AdminEmployeeList(Request $request){
        $admin_id=$request->header('id');
        return AdminEmployee::where('admin_id',$admin_id)->get();
    }
    
    

    function AdminEmployeeCreate(Request $request){
        $admin_id=$request->header('id');
        return AdminEmployee::create([
            'fullName'=>$request->input('fullName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('mobile'),
            'role'=>$request->input('role'),
            'admin_id'=> $admin_id
        ]);
    }

    function AdminEmployeeDelete(Request $request){
        $adminemployee_id=$request->input('id');
        $admin_id=$request->header('id');
        return AdminEmployee::where('id',$adminemployee_id)->where('admin_id',$admin_id)->delete();
    }




    function AdminEmployeeUpdate(Request $request){
        $admin_id=$request->header('id');
        $adminemployee_id=$request->input('id');
        return AdminEmployee::where('id',$adminemployee_id)->where('admin_id',$admin_id)->update([
            'fullName'=>$request->input('fullName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('mobile'),
            'role'=>$request->input('role'),
            'admin_id'=> $admin_id
        ]);
    }

    function AdminEmployeeByID(Request $request)
    {
        $admin_id=$request->header('id');
        $adminemployee_id=$request->input('id');
        return AdminEmployee::where('id',$adminemployee_id)->where('admin_id',$admin_id)->first();
    }
}
