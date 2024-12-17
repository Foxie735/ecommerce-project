<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Customer Data";
        $itemcustomer = User::where('role', 'member')->paginate(20);
        return view('customer.index', compact('title', 'itemcustomer'))->with('no', 1);
    }

    public function find(Request $request)
    {
        $title = 'Find Customer';
        $find = $request->key;
        $itemcustomer = User::where('role', 'member')
                            ->Where('name','LIKE','%'.$find.'%')
                            ->orWhere('email','LIKE','%'.$find.'%')
                            ->orWhere('telephone','LIKE','%'.$find.'%')
                            ->orWhere('status','LIKE','%'.$find.'%')
                            ->paginate(20);
        return view('customer.index', compact('title', 'itemcustomer', 'find'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $title = "Edit Customer";
        $itemcustomer = User::findOrFail($id);
        return view('customer.edit', compact('title', 'itemcustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        User::where('id_user', '=', $id)->update(['status' => $request->status]);
        return redirect()->route('customer.index')->with('success', 'Customer updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
