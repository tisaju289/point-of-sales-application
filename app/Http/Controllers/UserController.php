<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTOMail;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{



    
    function LoginPage():View{
        return view('pages.user-auth.login-page');
    }

    function RegistrationPage():View{
        return view('pages.user-auth.registration-page');
    }
    function SendOtpPage():View{
        return view('pages.user-auth.send-otp-page');
    }
    function VerifyOTPPage():View{
        return view('pages.user-auth.verify-otp-page');
    }

    function ResetPasswordPage():View{
        return view('pages.user-auth.reset-pass-page');
    }

    function ProfilePage():View{
        return view('pages.user-dashboard.profile-page');
    }


    public function UserRegistration(Request $request){

        try{
            $request->validate([
                "firstName"=> 'required|string|max:50',
                "lastName"=>'required|string|max:50',
                "email"=>'required|string|max:50',
                "mobile"=>'required|string|max:50',
                "password"=>'required|string|min:3',
            ]);
    
            User::create([
                "firstName"=>$request->input("firstName"),
                "lastName"=>$request->input("lastName"),
                "email"=>$request->input("email"),
                "mobile"=>$request->input("mobile"),
                "password"=>$request->input("password"), 
            ]);
    
            return response()->json(['status'=>'success', 'message'=> 'User Registration Successfully']);
        }catch(Exception $e){
            return response()->json(['status'=>'Failed', 'message'=> $e->getMessage()]);
        }

    }

    public function UserLogin(Request $request){
        try{
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);
    
            $user = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();
    
            if (!$user) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }
            $token=JWTToken::CreateToken($request->input('email'),$user->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
            ],200)->cookie('token',$token,time()+60*24*30);
    

        }catch(Exception $e){
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }


    public function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }



    function SendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            User::where('email','=',$email)->update(['otp'=>$otp]);

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
    function VerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=User::where('email','=',$email)
            ->where('otp','=',$otp)->count();

        if($count==1){
            // Database OTP Update
            User::where('email','=',$email)->update(['otp'=>'0']);

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

    function ResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=$request->input('password');
            User::where('email','=',$email)->update(['password'=>$password]);
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

 

    function UserProfile(Request $request){
        $email=$request->header('email');
        $user=User::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);
    }

    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            User::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
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
