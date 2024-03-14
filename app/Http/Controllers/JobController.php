<?php

namespace App\Http\Controllers;

use index;
use App\Models\Job;
use App\Models\Company;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    public function indexs()
    {
        $jobs = Job::all(); // Retrieve all job listings
      
        return view('jobs.index', ['jobs' => $jobs]); // Pass the job listings to the view
    }


    function JobPage():View{
        return view('pages.admin-dashboard.job-page');
    }
    
    function CompanyJobPage():View{
        return view('pages.company-dashboard.job-page');
    }
    function CompanyJobApplyPage():View{
        return view('pages.company-dashboard.jobapply-page');
    }



    public function AdminJobList(Request $request){
        // return Job::with('Company')->get();
        $jobs=Job::all();
       
        return $jobs;
        
    }
  
    public function HomeJobList():JsonResponse
    {
        $data= Job::all();
        return  ResponseHelper::Out('success',$data,200);
    }



    public function JobList(Request $request){
        $company_id=$request->header('id');
        return Job::where('company_id',$company_id)->get();
    }
    

    function JobCreate(Request $request){
        $company_id=$request->header('id');
        return Job::create([
            'title'=>$request->input('title'),
            'company_id'=>$company_id,
            'category_id'=>$request->input('category_id'),
            'jobtype_id'=>$request->input('jobtype_id'),
            'vacancy'=>$request->input('vacancy'),
            'salary'=>$request->input('salary'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'benefits'=>$request->input('benefits'),
            'experience'=>$request->input('experience'),
            'responsibility'=>$request->input('responsibility'),
            'qualification'=>$request->input('qualification'),
            'keyword'=>$request->input('keyword'),
            'company_name'=>$request->input('company_name'),
            'company_location'=>$request->input('company_location'),
            'website'=>$request->input('website'),
            'published_date'=>$request->input('published_date'),
        ]);
    }


    function JobDelete(Request $request){
        $job_id=$request->input('id');
        $Company_id=$request->header('id');
        return Job::where('id',$job_id)->where('company_id',$Company_id)->delete();
    }
    function AdminJobDelete(Request $request){
        $job_id=$request->input('id');
        return Job::where('id',$job_id)->delete();
    }

    function JobUpdate(Request $request){
        $company_id=$request->header('id');
        $job_id=$request->input('id');
        return Job::where('id',$job_id)->where('company_id',$company_id)->update([
            'company_id'=> $company_id,
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
            'jobtype_id'=>$request->input('jobtype_id'),
            'vacancy'=>$request->input('vacancy'),
            'salary'=>$request->input('salary'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'benefits'=>$request->input('benefits'),
            'experience'=>$request->input('experience'),
            'responsibility'=>$request->input('responsibility'),
            'qualification'=>$request->input('qualification'),
            'keyword'=>$request->input('keyword'),
            'company_name'=>$request->input('company_name'),
            'company_location'=>$request->input('company_location'),
            'website'=>$request->input('website'),
            'published_date'=>$request->input('published_date'),
        ]);
    }


    function JobByID(Request $request)
    {
        // $company_id=$request->header('id');
        $job_id=$request->input('id');
        $jobs=JOb::where('id',$job_id)->first();
        return view('components.job_details', compact('jobs'));
    }
    function ApplyJobByID(Request $request)
    {
        // $company_id=$request->header('id');
        $job_id=$request->input('id');
        $jobs=JOb::where('id',$job_id)->first();
        return view('pages.application.application-page', compact('jobs'));
    }
    
    function AdminJobByID(Request $request)
    {
        $job_id=$request->input('id');
        return JOb::where('id',$job_id)->first();
    }
    



        public function NavJobPage(){
        return view('pages.NavJobPage');
        }

        public function UserNavJobPage(){
            return view('pages.UserNavJobPage');
            }

}
