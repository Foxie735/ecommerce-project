<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Product";
        $items = Product::paginate(20);
        $page = $request->page ?? 1;
        $no = ($page -1) * 20;
        return view('product.index', compact('title', 'items', 'no'));
    }

    public function find(Request $request)
    {
        $title = 'Find Product';
        $find = $request->key;
        $items = Product::where('code_product','LIKE','%'.$find.'%')
                            ->orWhere('name_product','LIKE','%'.$find.'%')
                            ->orWhere('status','LIKE','%'.$find.'%')
                            ->paginate(20);
        return view('product.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Product Page";
        $itemcategory = Category::orderBy('name_category', 'asc')->get();
        return view('product.create', compact('title', 'itemcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code_product' => 'required|unique:product',
            'name_product' => 'required',
            'slug_product' => 'required',
            'description_product' => 'required',
            'id_category' => 'required',
            'quantity' => 'required|numeric',
            'per_unit' => 'required',
            'price' => 'required|numeric',
            'discount' => 'numeric'
        ]);

        $input = $request->all();
        $input['slug_product'] = Str::slug($request->slug_product);

        Product::create($input);
        return redirect()->route('product.index')->with('success', 'Product data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Product Detail";
        $detailProduct = Product::findOrFail($id);
        $imageProduct = ImageProduct::where('id_product', $id)->get();
        return view('product.show', compact('title', 'detailProduct', 'imageProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Product Page";
        $product = Product::findOrFail($id);
        $itemsCategory = Category::all();
        return view('product.edit', compact('title', 'product', 'itemsCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'code_product' => 'required',
            'name_product' => 'required',
            'slug_product' => 'required',
            'description_product' => 'required',
            'id_category' => 'required',
            'quantity' => 'required|numeric',
            'per_unit' => 'required',
            'price' => 'required|numeric',
            'discount' => 'numeric'
        ]);

        $itemproduct = Product::findOrFail($id);
        $slug = Str::slug($request->slug_product);
        $validationslug = Product::where('id_product', '!=', $id)
                                    ->where('slug_product', $slug)
                                    ->first();
        if($validationslug) {
            return back()->with('error', 'Slug already exist, try another slug');
        } else {
            $input = $request->all();
            $input['slug_product'] = $slug;
            $itemproduct->update($input);

            return redirect()->route('product.index')->with('success', 'Product data updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        ImageProduct::where('id_product', $product->id_product)->delete();

        $img_product = ImageProduct::where('id_product', $product->id_product)->get();

        foreach($img_product as $img) {
            if (file_exists($img->img_product)) {
                unlink($img->img_product);
            }
        }

        if ($product->delete()) {
            return back()->with('success', 'Data deleted');
        } else {
            return back()->with('error', 'Data failed to delete, try again');
        }
    }

    public function destroy_image ($id)
    {
        $imageproduct = ImageProduct::findOrFail($id);

        if (file_exists($imageproduct->img_product)) {
            unlink($imageproduct->img_product);
        }

        if ($imageproduct->delete()) {
            return back()->with('success', 'Image deleted');
        } else {
            return back()->with('error', 'Image failed to delete, try again');
        }
    }

    public function store_image (Request $request) 
    {
        $this->validate($request, [
            'img_product' => 'required'
        ]);
        
        $input = $request->all();

        $img_product = null;
        if ($request->hasFile('img_product')) {
            $img = $request->file('img_product'); // Correct file input field
            $img_product = time() . '_' . $img->getClientOriginalName();
            $img->move('upload/image_product', $img_product);
            $input['img_product'] = 'upload/image_product/' . $img_product;
        }

        ImageProduct::create($input);
        return redirect()->back()->with('success', 'Image saved');
    }
}
