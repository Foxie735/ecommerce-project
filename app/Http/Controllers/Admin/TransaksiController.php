<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Transaction Data";
        $itemuser = auth()->user();
        $itemorder = Order::join('cart', 'order.id_cart', '=', 'cart.id_cart')
                    ->where('status_cart', 'checkout')
                    ->orderBy('order.created_at', 'desc')
                    ->paginate(20); 
        return view('transaction.index', compact('title', 'itemuser', 'itemorder'))->with('no', ($request->input('page', 1)-1)*20);
    }

    public function find(Request $request)
    {
        $title = 'Transaction Data';
        $find = $request->key;

        if($find === 'Not Paid') {
            $find = 'notpaid';
        } else if ($find === 'Paid') {
            $find = 'paid';
        } else if ($find === 'Not done') {
            $find = 'notdone';
        } else if ($find === 'Done') {
            $find = 'done';
        } else {
            $find = $request->key;
        }

        $itemorder = Cart::join('order', 'cart.id_cart', '=', 'order.id_cart')
                    ->join('users', 'cart.id_user', '=', 'users.id_user')
                    ->where('users.name', 'LIKE', '%'.$find.'%')
                    ->orWhere('order.nama_penerima', 'LIKE', '%'.$find.'%')
                    ->orWhere('cart.payment_status', 'LIKE', '%'.$find.'%')
                    ->orWhere('cart.delivery_status', 'LIKE', '%'.$find.'%')
                    ->orderBy('order.created_at', 'desc')
                    ->paginate(20); 

        return view('transaction.index', compact('title', 'itemorder'))->with('no', ($request->input('page', 1)-1)*20);
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
        $title = "Transaction Detail";
        $itemorder = Order::findOrFail($id);
        return view('transaction.show', compact('title', 'itemorder'))->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Edit Transaction";
        $itemorder = Order::findOrFail($id);

        return view('transaction.edit', compact('title', 'itemorder'))->with('no', 1);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'payment_status' => 'required',
            'delivery_status' => 'required',
            'subtotal' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        $input = $request->all();
        $input['payment_status'] = $request->payment_status;
        $input['delivery_status'] = $request->delivery_status;
        $input['subtotal'] = str_replace(',', '',$request->subtotal);
        $input['shipping_cost'] = str_replace(',', '',$request->shipping_cost);
        $input['total'] = str_replace(',', '',$request->total);
        $itemorder = Order::findOrFail($id);
        $itemorder->Cart->update($input);
        return back()->with('success', 'Order updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
