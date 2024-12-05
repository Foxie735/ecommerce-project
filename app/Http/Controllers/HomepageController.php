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
}
