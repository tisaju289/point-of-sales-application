<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{





    function BlogPage():View{
        return view('pages.admin-dashboard.blog-page');
    }





    public function NavBlogPage(){
        return view('pages.NavBlogPage');
        }
        public function UserNavBlogPage(){
            return view('pages.UserNavBlogPage');
            }







    public function BlogList(Request $request){
        $admin_id=$request->header('id');
        return Blog::all();
    }
    public function HomeBlogList():JsonResponse
    {
        $data= Blog::all();
        return  ResponseHelper::Out('success',$data,200);
    }
    
    

    function BlogCreate(Request $request){
        $admin_id=$request->header('id');
        return Blog::create([
            'admin_id'=> $admin_id,
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
           
        ]);
    }

    function BlogDelete(Request $request){
        $blog_id=$request->input('id');
        return Blog::where('id',$blog_id)->delete();
    }


    public function updateStatus(Request $request, $id)
    {
     
        try {
            // Find the blog by ID
            $blog = Blog::findOrFail($id);

            // Update the status
            $blog->status = $request->status;
            $blog->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            // Handle exception
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
    }

    function BlogUpdate(Request $request){
        $admin_id=$request->header('id');
        $blog_id=$request->input('id');
        return Blog::where('id',$blog_id)->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'admin_id'=> $admin_id
            
            
        ]);
    }

    function BlogByID(Request $request)
    {
        // $admin_id=$request->header('id');
        $blog_id=$request->input('id');
        return Blog::where('id',$blog_id)->first();
    }
}
