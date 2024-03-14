<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function CategoryList()
    {
        return Category::all();
        
    }

}
