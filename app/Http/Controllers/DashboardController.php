<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Job;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function UserDashboardPage():View{
        return view('pages.user-dashboard.dashboard-page');
    }
    function CompanyDashboardPage():View{
        return view('pages.company-dashboard.dashboard-page');
    }
    function AdminDashboardPage():View{
        return view('pages.admin-dashboard.dashboard-page');
    }

    public function AdminSummary(Request $request): array {
        $Company = Company::count();
       
        $jobs = Job::count();
    
        return [
            'Company' => $Company,
            'jobs' => $jobs,
        ];
    }
    function CompanySummary(Request $request):array{
        
        $Active_Company= Company::where('status','=','active')->get()->count();
        $pending_Company= Company::where('status','=','pending')->get()->count();
        $jobs=Job::all()->count();
      

        return[
            'Active_Company'=> $Active_Company,
            'pending_Company'=> $pending_Company,
            'jobs'=> $jobs,
        ];


    }
    function UserSummary(Request $request):array{
        
        $Active_Company= Company::where('status','=','active')->get()->count();
        $pending_Company= Company::where('status','=','pending')->get()->count();
        $jobs=Job::all()->count();
      

        return[
            'Active_Company'=> $Active_Company,
            'pending_Company'=> $pending_Company,
            'jobs'=> $jobs,
        ];


    }
}
