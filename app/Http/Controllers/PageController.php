<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{

    function PagePage():View{
        return view('pages.admin-dashboard.page-page');
    }






    public function PageList(Request $request){
        $admin_id=$request->header('id');
        return Page::all();
    }
    
    




    

    function PageCreate(Request $request){
        $admin_id=$request->header('id');
        return Page::create([
            'admin_id'=> $admin_id,
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'content'=>$request->input('content'),
           
        ]);
    }













    function PageDelete(Request $request){
        $page_id=$request->input('id');
        return Page::where('id',$page_id)->delete();
    }




    function PageUpdate(Request $request){
        $admin_id=$request->header('id');
        $page_id=$request->input('id');
        return Page::where('id',$page_id)->update([
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'content'=>$request->input('content'),
            'admin_id'=> $admin_id
            
            
        ]);
    }

    function PageByID(Request $request)
    {
        $admin_id=$request->header('id');
        $page_id=$request->input('id');
        return Page::where('id',$page_id)->where('admin_id',$admin_id)->first();
    }
}
