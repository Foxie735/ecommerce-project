<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Product Category";
        $items = Category::paginate(1);
        $page = $request->page ?? 1;
        $no = ($page -1) * 1;
        return view('category.index', compact('title', 'items', 'no'));
    }

    public function find(Request $request)
    {
        $title = 'Find Category';
        $find = $request->key;
        $items = Category::where('code_category','LIKE','%'.$find.'%')
                            ->orWhere('name_category','LIKE','%'.$find.'%')
                            ->orWhere('status','LIKE','%'.$find.'%')
                            ->paginate(1);
        return view('category.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Form Category";
        return view('category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code_category' => 'required|unique:category',
            'name_category' => 'required',
            'slug_category' => 'required',
            'status' => 'required',
            'description_category' => 'required',
        ]);

        $input = $request->all();
        $input['slug_category'] = Str::slug($request->slug_category);

        $img_category = null;
        if ($request->hasFile('img_category')) {
            $img = $request->file('img_category'); // Correct file input field
            $img_category = time() . '_' . $img->getClientOriginalName();
            $img->move('upload/category', $img_category);
            $input['img_category'] = 'upload/category/' . $img_category;
        }

        Category::create($input);

        return redirect()->route('category.index')->with('success', 'Category data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Form Category";
        $category = Category::findOrFail($id);
        return view('category.edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'code_category' => 'required',
            'name_category' => 'required',
            'slug_category' => 'required',
            'status' => 'required',
            'description_category' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $input = $request->all();
        $input['slug_category'] = Str::slug($request->slug_category);

        $img_category = $category->img_category;
        if ($request->hasFile('img_category')) {
            $img = $request->file('img_category'); // Correct file input field
            $img_category = time() . '_' . $img->getClientOriginalName();
            $img->move('upload/category', $img_category);
            $input['img_category'] = 'upload/category/' . $img_category;
        }

        $category->update($input);

        return redirect()->route('category.index')->with('success', 'Category data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if(count($category->product) > 0) {
            return back()->with('error', 'Delete the product first inside this category, Proccess Failed');
        } else {
            if ($category->delete()) {
                return back()->with('success', 'Data deleted');
            } else {
                return back()->with('error', 'Data failed to delete');
            }
        }
    }
}
