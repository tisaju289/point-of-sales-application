<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomePage(){
        return view('pages.copyHome');
    }
    function UserAuthHomePage(){
        return view('pages.userHome');
    }
}
