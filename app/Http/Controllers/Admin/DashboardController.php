<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $itemorder = Order::count();
        $productCount = Product::count(); // Total products
        $memberCount = User::where('role', 'member')->count();
        return view('dashboard.index', compact('title', 'itemorder', 'productCount', 'memberCount'));
    }
}
