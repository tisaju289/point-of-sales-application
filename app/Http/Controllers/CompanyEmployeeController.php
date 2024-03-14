<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyEmployee;

class CompanyEmployeeController extends Controller
{
    public function CompanyEmployeeList(Request $request){
        $company_id=$request->header('id');
        return CompanyEmployee::where('company_id',$company_id)->get();
    }
    
    

    function CompanyEmployeeCreate(Request $request){
        $company_id=$request->header('id');
        return CompanyEmployee::create([
            'fullName'=>$request->input('fullName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('mobile'),
            'role'=>$request->input('role'),
            'company_id'=> $company_id
        ]);
    }

    function CompanyEmployeeDelete(Request $request){
        $companyemployee_id=$request->input('id');
        $company_id=$request->header('id');
        return CompanyEmployee::where('id',$companyemployee_id)->where('company_id',$company_id)->delete();
    }




    function CompanyEmployeeUpdate(Request $request){
        $company_id=$request->header('id');
        $companyemployee_id=$request->input('id');
        return CompanyEmployee::where('id',$companyemployee_id)->where('company_id',$company_id)->update([
            'fullName'=>$request->input('fullName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('mobile'),
            'role'=>$request->input('role'),
            'company_id'=> $company_id
        ]);
    }

    function CompanyEmployeeByID(Request $request)
    {
        $company_id=$request->header('id');
        $companyemployee_id=$request->input('id');
        return CompanyEmployee::where('id',$companyemployee_id)->where('company_id',$company_id)->first();
    }
}
