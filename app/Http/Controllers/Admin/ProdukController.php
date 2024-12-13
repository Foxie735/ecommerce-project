<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('product.show', compact('title'));
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
        //
    }
}
