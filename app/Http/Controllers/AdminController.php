<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\OTPMail;
use App\Models\Admin;
use App\Helper\JWTToken;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{




 
    function AdminLoginPage():View{
        return view('pages.admin-auth.login-page');
    }

    function AdminSendOtpPage():View{
        return view('pages.admin-auth.send-otp-page');
    }
    function AdminVerifyOTPPage():View{
        return view('pages.admin-auth.verify-otp-page');
    }

    function AdminResetPasswordPage():View{
        return view('pages.admin-auth.reset-pass-page');
    }

    function AdminProfilePage():View{
        return view('pages.admin-dashboard.profile-page');
    }















    public function AdminLogin(Request $request){
        try{
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);
    
            $admin = Admin::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();
    
            if (!$admin) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }
            $token=JWTToken::CreateToken($request->input('email'),$admin->id);
            return response()->json([
                'status' => 'success',
                'message' => 'admin Login Successful',
            ],200)->cookie('token',$token,time()+60*24*30);
    

        }catch(Exception $e){
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }


    public function AdminLogout(){
        return redirect('/')->cookie('token','',-1);
    }



    function AdminSendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=Admin::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            Admin::where('email','=',$email)->update(['otp'=>$otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ],200);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ]);
        }
    }


    function AdminVerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=Admin::where('email','=',$email)
            ->where('otp','=',$otp)->count();

        if($count==1){
            // Database OTP Update
            Admin::where('email','=',$email)->update(['otp'=>'0']);

            // Pass Reset Token Issue
            $token=JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ],200)->cookie('token',$token,60*24*30);

        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],200);
        }
    }

    function AdminResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=$request->input('password');
            Admin::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }

 

    function AdminProfile(Request $request){
        $email=$request->header('email');
        $company=Admin::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $company
        ],200);
    }

    function AdminUpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $admin_name=$request->input('admin_name');
            $password=$request->input('password');
            Admin::where('email','=',$email)->update([
                'admin_name'=>$admin_name,
                'password'=>$password
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }






}
