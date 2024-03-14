<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    function PluginPage():View{
        return view('pages.company-dashboard.plugin-page');
    }
    function AdminPluginPage():View{
        return view('pages.admin-dashboard.plugin-page');
    }
}
