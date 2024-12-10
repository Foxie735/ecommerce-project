<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() 
    {
        $title = "Sells Report";
        return view('report.index', compact('title'));
    }
    public function process() 
    {
        $title = "Sells Report Process";
        return view('report.process', compact('title'));
    }
}
