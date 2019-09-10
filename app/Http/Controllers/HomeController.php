<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
     $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();
        return view('frontend.index',compact('category'));
    }
}
