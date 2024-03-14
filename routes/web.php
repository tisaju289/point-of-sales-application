<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyBlogController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\CompanyEmployeeController;
use App\Http\Middleware\TokenVerificationMiddleware;



//Admin Authentication Page Routes
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/user-auth-home',[HomeController::class,'UserAuthHomePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/adminLogin',[AdminController::class,'AdminLoginPage']);
Route::get('/adminsendOtp',[AdminController::class,'AdminSendOtpPage']);
Route::get('/adminVerifyOtp',[AdminController::class,'AdminVerifyOTPPage']);
Route::get('/adminResetPassword',[AdminController::class,'AdminResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/adminProfile',[AdminController::class,'AdminProfilePage'])->middleware([TokenVerificationMiddleware::class]);

//Admin Authentication API Route 
Route::post('/admin-login', [AdminController::class,'AdminLogin']);
Route::get('/admin-logout', [AdminController::class,'AdminLogout'])->middleware(TokenVerificationMiddleware::class);
Route::get('/admin-profile', [AdminController::class,'AdminProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/admin-update-profile', [AdminController::class,'AdminUpdateProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/admin-send-OTP', [AdminController::class,'AdminSendOTPCode']);
Route::post('/admin-verify-OTP', [AdminController::class,'AdminVerifyOTP']);
Route::post('/admin-reset-password', [AdminController::class,'AdminResetPassword'])->middleware(TokenVerificationMiddleware::class);

//Company Authentication Page Routes
Route::get('/companyLogin',[CompanyController::class,'CompanyLoginPage']);
Route::get('/companyRegistration',[CompanyController::class,'CompanyRegistrationPage']);
Route::get('/companySendOtp',[CompanyController::class,'CompanySendOtpPage']);
Route::get('/companyVerifyOtp',[CompanyController::class,'CompanyVerifyOTPPage']);
Route::get('/companyResetPassword',[CompanyController::class,'CompanyResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/companyProfile',[CompanyController::class,'CompanyProfilePage'])->middleware([TokenVerificationMiddleware::class]);

//Company Authentication API Route 
Route::post('/company-registration', [CompanyController::class,'CompanyRegistration']);
Route::post('/company-login', [CompanyController::class,'CompanyLogin']);
Route::get('/company-logout', [CompanyController::class,'CompanyLogout'])->middleware(TokenVerificationMiddleware::class);
Route::get('/company-profile', [CompanyController::class,'CompanyProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/company-update-profile', [CompanyController::class,'CompanyUpdateProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/company-send-OTP', [CompanyController::class,'CompanySendOTPCode']);
Route::post('/company-verify-OTP', [CompanyController::class,'CompanyVerifyOTP']);
Route::post('/company-reset-password', [CompanyController::class,'CompanyResetPassword'])->middleware(TokenVerificationMiddleware::class);

//User Authentication Page Routes
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);

//User Authentication API Route 
Route::post('/user-registration', [UserController::class,'UserRegistration']);
Route::post('/user-login', [UserController::class,'UserLogin']);
Route::get('/user-logout', [UserController::class,'UserLogout'])->middleware(TokenVerificationMiddleware::class);
Route::get('/user-profile', [UserController::class,'UserProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/user-update', [UserController::class,'UpdateProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/user-send-OTP', [UserController::class,'SendOTPCode']);
Route::post('/user-verify-OTP', [UserController::class,'VerifyOTP']);
Route::post('/user-reset-password', [UserController::class,'ResetPassword'])->middleware(TokenVerificationMiddleware::class);


/* ******************************************************************************************************************************** */
/* ******************************************************************************************************************************** */
/* ******************************************************************************************************************************** */

//User, Company, Admin Dashboard Page
Route::get('/Dashboard',[DashboardController::class,'UserDashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-dashboard',[DashboardController::class,'UserDashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/company-dashboard',[DashboardController::class,'CompanyDashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/admin-dashboard',[DashboardController::class,'AdminDashboardPage'])->middleware([TokenVerificationMiddleware::class]);


//Company API Route
Route::get('/companyPage',[CompanyController::class,'CompanyPage']);
Route::get("/list-company",[CompanyController::class,'CompanyList']);
Route::get("/admin-list-company",[CompanyController::class,'AdminCompanyList']);
Route::post("/delete-company",[CompanyController::class,'CompanyDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/company-by-id",[CompanyController::class,'CompanyByID']);

//Job API Route
Route::get('/jobs',[JobController::class,'indexs']);
Route::get('/jobPage',[JobController::class,'JobPage']);
Route::get('/companyjobPage',[JobController::class,'CompanyJobPage']);
Route::get('/companyjobApplyPage',[JobController::class,'CompanyJobApplyPage']);
Route::get("/HomeJobList",[JobController::class,'HomeJobList']);
Route::get("/list-job",[JobController::class,'JobList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-job",[JobController::class,'JobCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-job",[JobController::class,'JobDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/job-by-id",[JobController::class,'JobByID']);
Route::get("/apply-job-by-id",[JobController::class,'ApplyJobByID'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-job",[JobController::class,'JobUpdate'])->middleware([TokenVerificationMiddleware::class]);


//Admin Jobs List
Route::get('/admin-job-list',[JobController::class,'AdminJobList']);
Route::post('/admin-job-delete',[JobController::class,'AdminJobDelete']);
Route::post('/admin-job-by-id',[JobController::class,'AdminJobByID']);


//Admin Employee API Route
Route::get("/list-adminemployee",[AdminEmployeeController::class,'AdminEmployeeList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-adminemployee",[AdminEmployeeController::class,'AdminEmployeeCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-adminemployee",[AdminEmployeeController::class,'AdminEmployeeUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delele-adminemployee",[AdminEmployeeController::class,'AdminEmployeeDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/id-by-adminemployee",[AdminEmployeeController::class,'AdminEmployeeByID'])->middleware([TokenVerificationMiddleware::class]);

//Company Employee API Route
Route::get("/list-companyemployee",[CompanyEmployeeController::class,'CompanyEmployeeList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-companyemployee",[CompanyEmployeeController::class,'CompanyEmployeeCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-companyemployee",[CompanyEmployeeController::class,'CompanyEmployeeUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delele-companyemployee",[CompanyEmployeeController::class,'CompanyEmployeeDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/id-by-companyemployee",[CompanyEmployeeController::class,'CompanyEmployeeByID'])->middleware([TokenVerificationMiddleware::class]);

//Blogs API Route
Route::get('/blogPage',[BlogController::class,'BlogPage']);
Route::get("/BlogList",[BlogController::class,'HomeBlogList']);
Route::get("/list-blog",[BlogController::class,'BlogList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-blog",[BlogController::class,'BlogCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-blog",[BlogController::class,'BlogUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delele-blog",[BlogController::class,'BlogDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/id-by-blog",[BlogController::class,'BlogByID'])->middleware([TokenVerificationMiddleware::class]);

//Pages API Route
Route::get('/pagePage',[PageController::class,'PagePage']);
Route::get("/list-page",[PageController::class,'PageList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-page",[PageController::class,'PageCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-page",[PageController::class,'PageUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delele-page",[PageController::class,'PageDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/id-by-page",[PageController::class,'PageByID'])->middleware([TokenVerificationMiddleware::class]);

//plugin API Route
Route::get('/pluginPage',[PluginController::class,'PluginPage']);
Route::get('/AdminpluginPage',[PluginController::class,'AdminPluginPage']);
/* ******************************************************************************************************************************** */
/* ******************************************************************************************************************************** */
/* ******************************************************************************************************************************** */



//Admin, Companies, User Dashboard Summary Route
Route::get("/admin-summary",[DashboardController::class,'AdminSummary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/company-summary",[DashboardController::class,'CompanySummary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/user-summary",[DashboardController::class,'UserSummary'])->middleware([TokenVerificationMiddleware::class]);







Route::get('/ApplicationPage', [ApplicationController::class, 'ApplicationPage']);
Route::post('/applications', [ApplicationController::class, 'store'])->name('store.application');
Route::get('/apply-list', [ApplicationController::class, 'ApplyList']);



Route::get('/CVdownload', [ApplicationController::class, 'CVdownload']);


Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);
Route::get('/JobTypeList', [JobTypeController::class, 'JobTypeList']);



Route::get('/NavAboutPage', [AboutController::class, 'NavAboutPage']);
Route::get('/NavJobPage', [JobController::class, 'NavJobPage']);
Route::get('/NavContactPage', [ContactController::class, 'NavContactPage']);
Route::get('/NavBlogPage', [BlogController::class, 'NavBlogPage']);




Route::get('/UserNavAboutPage', [AboutController::class, 'UserNavAboutPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/UserNavJobPage', [JobController::class, 'UserNavJobPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/UserNavContactPage', [ContactController::class, 'UserNavContactPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/UserNavBlogPage', [BlogController::class, 'UserNavBlogPage'])->middleware([TokenVerificationMiddleware::class]);





Route::post('/send-message', [ContactController::class,'SendMessage'])->middleware([TokenVerificationMiddleware::class]);





Route::post('/update-status', [BlogController::class,'updateStatus'])->middleware([TokenVerificationMiddleware::class]);






//Blogs API Route
Route::get('/companyBlogPage',[CompanyBlogController::class,'CompanyBlogPage']);
// Route::get("/BlogList",[BlogController::class,'HomeBlogList']);
Route::get("/company-list-blog",[CompanyBlogController::class,'CompanyBlogList']);
Route::post("/company-create-blog",[CompanyBlogController::class,'CompanyBlogCreate']);
Route::post("/company-update-blog",[CompanyBlogController::class,'CompanyBlogUpdate']);
Route::post("/company-delele-blog",[CompanyBlogController::class,'CompanyBlogDelete']);
Route::post("/company-id-by-blog",[CompanyBlogController::class,'CompanyBlogByID']);

























































