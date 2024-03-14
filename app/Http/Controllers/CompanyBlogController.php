<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\CompanyBlog;
use Illuminate\Http\Request;

class CompanyBlogController extends Controller
{



    
    function CompanyBlogPage():View{
        return view('pages.company-dashboard.companyBlog-page');
    }
    function CompanyBlogCreate(Request $request){
        $company_id=$request->header('id');
        return CompanyBlog::create([
            'company_id'=> $company_id,
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
           
        ]);
    }

    function CompanyBlogDelete(Request $request){
        $blog_id=$request->input('id');
        return CompanyBlog::where('id',$blog_id)->delete();
    }


    // public function updateStatus(Request $request, $id)
    // {
     
    //     try {
    //         // Find the blog by ID
    //         $blog = Blog::findOrFail($id);

    //         // Update the status
    //         $blog->status = $request->status;
    //         $blog->save();

    //         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    //     } catch (\Exception $e) {
    //         // Handle exception
    //         return response()->json(['success' => false, 'message' => 'Failed to update status']);
    //     }
    // }

    function CompanyBlogUpdate(Request $request){
        $company_id=$request->header('id');
        $blog_id=$request->input('id');
        return CompanyBlog::where('id',$blog_id)->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'company_id'=> $company_id
            
            
        ]);
    }

    function CompanyBlogByID(Request $request)
    {
        // $admin_id=$request->header('id');
        $blog_id=$request->input('id');
        return CompanyBlog::where('id',$blog_id)->first();
    }



    function CompanyBlogList(Request $request)
    {
        // $admin_id=$request->header('id');
     
        return CompanyBlog::all();
    }
}

