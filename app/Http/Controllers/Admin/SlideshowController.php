<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    public function index (Request $request) 
    {
        $title = 'Data Slideshow';
        $itemslideshow = Slideshow::paginate(5);
        $page = $request->page ?? 1;
        $no = ($page -1) * 5;
        return view('slideshow.index', compact('title', 'itemslideshow', 'no'));
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'img_slideshow' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $input = $request->all();

        $img_slideshow = null;
        if ($request->hasFile('img_slideshow')) {
            $img = $request->file('img_slideshow'); // Correct file input field
            $img_slideshow = time() . '_' . $img->getClientOriginalName();
            $img->move('upload/slideshow', $img_slideshow);
            $input['img_slideshow'] = 'upload/slideshow/' . $img_slideshow;
        }

        Slideshow::create($input);
        return redirect()->back()->with('success', 'Image saved');
    }

    public function destroy ($id)
    {
        $slideshow = Slideshow::findOrFail($id);
        if(file_exists($slideshow->img_slideshow)) {
            unlink($slideshow->img_slideshow);
        }

        if($slideshow->delete()) {
            return back()->with('success', 'Slideshow Deleted');
        } else {
            return back()->with('error', 'Slideshow failed to delete, try again');
        }
    }
}
