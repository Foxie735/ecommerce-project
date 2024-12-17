<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemshippingaddress = ShippingAddress::where('id_user', auth()->user()->id_user)->paginate(10);
        $active = 'cart';
        $title = "Shipping Address";
        return view('shippingaddress.index', compact('itemshippingaddress', 'title', 'active'))
                ->with('no', ($request->input('page', 1) - 1) * 10);
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
        $this->validate($request, [
            'nama_penerima' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'ward' => 'required',
            'postal_code' => 'required',
        ]);
        $itemuser = auth()->user();
        $input = $request->all();
        $input['id_user'] = $itemuser->id_user;
        $input['status'] = '1';
        $itemshippingaddress = ShippingAddress::create($input);

        ShippingAddress::where('id_shipping_address', '!=', $itemshippingaddress->id_shipping_address)
                        ->update(['status' => '2']);
        return back()->with('success', 'Address successfully saved');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $itemshippingaddress = ShippingAddress::findOrFail($id);
        $itemshippingaddress->update(['status' => '1']);
        ShippingAddress::where('id_shipping_address', '!=', $id)->update(['status' => '2']);
        return back()->with('success', 'Address updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
