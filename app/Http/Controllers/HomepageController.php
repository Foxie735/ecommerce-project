<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() 
    {
        $title = "Homepage";
        $active = "home";
        $itemproduct = Product::orderBy('created_at', 'desc')->where('status', 'publish')->limit(6)->get();
        $productpromo = Product::with('ImageProduct')
                        ->where('status', 'publish')
                        ->whereNotNull('discount')
                        ->orderBy('created_at', 'desc')
                        ->limit(6)
                        ->get();
        $itemcategory = Category::orderBy('name_category', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        return view('homepage.index', compact('title', 'active', 'itemproduct', 'productpromo', 'itemcategory', 'itemslide'));
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
