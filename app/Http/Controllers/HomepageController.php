<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() 
    {
        $title = "Homepage";
        $active = "home";
        return view('homepage.index', compact('title', 'active'));
    }
    public function about() 
    {
        $title = "about Us";
        $active = "about";
        return view('homepage.about', compact('title', 'active'));
    }
    public function contact() 
    {
        $title = "Contact";
        $active = "contact";
        return view('homepage.contact', compact('title', 'active'));
    }
    public function category() 
    {
        $title = "product Category";
        $active = "category";
        return view('homepage.category', compact('title', 'active'));
    }
}
