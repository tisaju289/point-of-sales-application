<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\OTPMail;
use App\Models\Company;
use App\Helper\JWTToken;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
   


    function CompanyPage():View{
        return view('pages.admin-dashboard.company-page');
    }
 
    function CompanyLoginPage():View{
        return view('pages.company-auth.login-page');
    }

    function CompanyRegistrationPage():View{
        return view('pages.company-auth.registration-page');
    }
    function CompanySendOtpPage():View{
        return view('pages.company-auth.send-otp-page');
    }
    function CompanyVerifyOTPPage():View{
        return view('pages.company-auth.verify-otp-page');
    }

    function CompanyResetPasswordPage():View{
        return view('pages.company-auth.reset-pass-page');
    }

    function CompanyProfilePage():View{
        return view('pages.company-dashboard.profile-page');
    }



    public function CompanyRegistration(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:50',
            'company_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
            'location' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:companies,email',
            'mobile' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            // Adjust validation rules as per your requirements
        ]);

        // Store the uploaded image
        $imageName = time().'.'.$request->company_img->extension();  
        $request->company_img->move(public_path('images'), $imageName);

        // Create and save the company record
        $company = new Company();
        $company->company_name = $validatedData['company_name'];
        $company->company_img = 'images/' . $imageName; // Store image path
        $company->location = $validatedData['location'];
        $company->email = $validatedData['email'];
        $company->mobile = $validatedData['mobile'];
        $company->password = $validatedData['password'];
        $company->save();

        // Optionally, you can return a response to the client
        return response()->json([
            'status' => 'success',
            'message' => 'Company Registration Successful'
        ]);
    }



    public function CompanyLogin(Request $request){
        try{
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);
    
            $company = Company::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();
    
            if (!$company) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }
            $token=JWTToken::CreateToken($request->input('email'),$company->id);
            return response()->json([
                'status' => 'success',
                'message' => 'Company Login Successful',
            ],200)->cookie('token',$token,time()+60*24*30);
    

        }catch(Exception $e){
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }


    public function CompanyLogout(){
        return redirect('/')->cookie('token','',-1);
    }



    public function CompanySendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=Company::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            Company::where('email','=',$email)->update(['otp'=>$otp]);

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


    public function CompanyVerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=Company::where('email','=',$email)
            ->where('otp','=',$otp)->count();

        if($count==1){
            // Database OTP Update
            Company::where('email','=',$email)->update(['otp'=>'0']);

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

    public function CompanyResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=$request->input('password');
            Company::where('email','=',$email)->update(['password'=>$password]);
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

 

    public function CompanyProfile(Request $request){
        $email=$request->header('email');
        $company=Company::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $company
        ],200);
    }

    public function CompanyUpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $company_name=$request->input('company_name');
            $location=$request->input('location');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            Company::where('email','=',$email)->update([
                'company_name'=>$company_name,
                'location'=>$location,
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
                'message' => $exception->getMessage(),
            ],200);
        }
    }




    public function AdminCompanyList()
    {
        return Company::all();
        
    }


    public function CompanyList():JsonResponse
    {
        $data= Company::all();
        return  ResponseHelper::Out('success',$data,200);
    }
         function CompanyDelete(Request $request){
           try{
            $company_id=$request->input('id');
            return Company::where('id',$company_id)->delete();
           }catch(Exception $e){
            return $e->getMessage();
           }
        }
        function CompanyByID(Request $request){
        $company_id= $request->input('id');
        return Company::where('id',$company_id)->first();
        }



        public function CompanyName(){
            $companies=Company::all();
            return $companies;
        }

 }
