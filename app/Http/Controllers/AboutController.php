<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   public function NavAboutPage(){
    return view('pages.NavAboutPage');
   }

   public function UserNavAboutPage(){
      return view('pages.UserNavAboutPage');
     }
}
