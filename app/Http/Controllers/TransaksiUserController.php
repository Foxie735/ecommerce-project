<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class TransaksiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemuser = auth()->user();

        $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
            $q->where('status_cart', 'checkout');
            $q->where('id_user', $itemuser->id_user);
        })->orderBy('created_at', 'desc')->paginate(20);
        
        $data = array(
            'title' => 'Data Transaction',
            'active' => 'transactionhistory',
            'itemorder' => $itemorder,
            'itemuser' => $itemuser
        );
        return view('usertransaction.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
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
        $itemuser = auth()->user();
        $itemcart = Cart::where('status_cart', 'process')
                    ->where('id_user', $itemuser->id_user)
                    ->first();
        if($itemcart) {
            $itemshippingaddress = ShippingAddress::where('id_user', $itemuser->id_user)
                                    ->where('status', '1')
                                    ->first();
            if($itemshippingaddress) {
                $inputorder['id_cart'] = $itemcart->id_cart;
                $inputorder['nama_penerima'] = $itemshippingaddress->nama_penerima;
                $inputorder['telephone'] = $itemshippingaddress->telephone;
                $inputorder['address'] = $itemshippingaddress->address;
                $inputorder['province'] = $itemshippingaddress->province;
                $inputorder['city'] = $itemshippingaddress->city;
                $inputorder['subdistrict'] = $itemshippingaddress->subdistrict;
                $inputorder['ward'] = $itemshippingaddress->ward;
                $inputorder['postal_code'] = $itemshippingaddress->postal_code;
                $itemorder = Order::create($inputorder);

                $itemcart->update(['status_cart' => 'checkout']);
                return redirect()->route('usertransaction.index')->with('success', 'Order successfully saved, please continue to payment');
            } else {
                return back()->with('error', 'Shipping Address has not been filled in');
            }
        } else {
            return abort('404');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $itemuser = auth()->user();
        $itemorder = Order::where('id_order', $id)
                    ->whereHas('cart', function($q) use ($itemuser) {
                        $q->where('id_user', $itemuser->id_user);
                    })->first();
        
        if($itemuser) {
            $data = array(
                'title' => 'Transaction Detail',
                'active' => 'transaction',
                'itemorder' => $itemorder
            );
            return view('usertransaction.show', $data)->with('no', 1);
        } else {
            return abort('404');
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
