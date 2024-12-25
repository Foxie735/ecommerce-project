<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slideshow;

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

        // if(auth()->user()) {
        //     if(auth()->user()->role === "admin") {
        //         return redirect('/admin');
        //     }
        // }
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
        $title = "Product Category";
        $active = "category";
        $itemcategory = Category::orderBy('name_category', 'asc')->get();
        $itemproduct = Product::orderBy('created_at', 'desc')->limit(6)->get();
        return view('homepage.category', compact('title', 'active', 'itemcategory', 'itemproduct'));
    }

    public function productdetail($slug)
    {
        $itemproduct = Product::where('slug_product', $slug)
            ->where('status', 'publish')
            ->first();

        if ($itemproduct) {
            $title = $itemproduct->name_product;
            $active = 'home';
            $itemproduct = $itemproduct;
            return view('homepage.productdetail', compact('title', 'active', 'itemproduct'));
        } else {
            return abort(404);
        }
    }

    public function categorybyslug($slug)
    {
        $category = Category::where('slug_category', $slug)->firstOrFail();
        $products = Product::where('id_category', $category->id_category)
            ->where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $title = $category->name_category;
        $active = 'category';

        return view('homepage.categorybyslug', compact('title', 'active', 'category', 'products'));
    }

    public function profile()
    {
        $title = "Profile";
        $active = "profile";
        return view('homepage.profile', compact('title', 'active'));
    }
}