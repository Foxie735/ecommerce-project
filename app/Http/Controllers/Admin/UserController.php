<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () 
    {
        $title = "User Profile";
        return view('user.index', compact('title'));
    }

    public function setting () 
    {
        $title = "Profile Setting";
        return view('user.setting', compact('title'));
    }
}
