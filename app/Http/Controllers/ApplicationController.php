<?php


namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\View\View;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    function CompanyJobApplyPage():View{
        return view('pages.company-dashboard.jobapply-page');
    }

    function ApplyList(){
        $application= Application::all();
        $job= Job::all();
        return $application;
          
        
    }







    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'portfolio' => 'nullable|string|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Example validation for file upload
            'cover_letter' => 'nullable|string',
        ]);

        // Store the validated data in the database
        $jobApplication = Application::create($validatedData);

        // Optionally, you can send a response back to the client
        return response()->json([
            'status' => 'success',
            'message' => 'Applicaton submit Successful'
        ]);
    }





    public function CVdownload(Application $resume)
    {
 
        if ($resume->resume) {

            $filePath = storage_path('app/resumes/' . $resume->resume);
            
      
            if (file_exists($filePath)) {
              
                return response()->download($filePath, $resume->resume . '_CV.pdf');
            }
        }
        
 
        return redirect()->back()->with('error', 'CV not found or file missing.');
    }
    
    







    
}
