<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(404);
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
            'id_product' => 'required',
        ]);

        $itemuser = auth()->user();

        $itemproduct = Product::findOrFail($request->id_product);

        if($itemproduct->quantity <= 0) {
            return back()->with('error', 'Out of stock');
        }

        $cart = Cart::where('id_user', $itemuser->id_user)
                ->where('status_cart', 'process')
                ->first();
        if ($cart) {
            $itemcart = $cart;
        } else {
            $no_invoice = Cart::where('id_user', $itemuser->id_user)->count();
            $inputancart['id_user'] = $itemuser->id_user;
            $inputancart['no_invoice'] = 'INV' . str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
            $inputancart['status_cart'] = 'process';
            $inputancart['payment_status'] = 'notpaid';
            $inputancart['delivery_status'] = 'notdone';
            $inputancart['status_cart'] = 'process';
            $itemcart = Cart::create($inputancart);
        }
        $checkdetail = CartDetail::where('id_cart', $itemcart->id_cart)
                        ->where('id_product', $itemproduct->id_product)
                        ->first();
        $qty = 1;
        $price = (100/100 - $itemproduct->discount / 100) * $itemproduct->price;
        $subtotal = ($qty * $price);

        if ($checkdetail) {
            Product::where('id_product', $checkdetail->id_product)->update([
                'quantity' => $itemproduct->quantity - 1,
            ]);

            $checkdetail->updatedetail($checkdetail, '+' , $qty, $price);
            $checkdetail->cart->updatetotal($checkdetail->cart, '+', $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['id_cart'] = $itemcart->id_cart;
            $inputan['id_product'] = $itemproduct->id_product;
            $inputan['quantity'] = $qty;
            $inputan['price'] = $price;
            $inputan['subtotal'] = ($qty * $price);
            $itemdetail = CartDetail::create($inputan);

            Product::where('id_product', $itemproduct->id_product)->update([
                'quantity' => $itemproduct->quantity - 1,
            ]);
            $itemdetail->cart->updatetotal($itemdetail->cart, '+', $subtotal);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to your cart');
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
    public function update(Request $request, string $id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        $param = $request->param;

        $checkproduct = Product::where('id_product', $itemdetail->id_product)->first();

        if ($param == 'plus') {
            if ($checkproduct->quantity != 0) {
                Product::where('id_product', $itemdetail->id_product)->update([
                    'quantity' => $checkproduct->quantity - 1,
                ]);
                $qty = 1;
                $price = (100/100 - $checkproduct->discount / 100) * $checkproduct->price;
                $subtotal = ($qty * $price);

                $itemdetail->updatedetail($itemdetail, '+' , $qty, $price);
                $itemdetail->cart->updatetotal($itemdetail->cart, '+' , $subtotal);
                return back()->with('success', "Item updated");
            } else {
                return back()->with('error', 'Insufficient stock');
            }
        }
        if ($param == 'minus') {
            if ($itemdetail->quantity > 1) {
                Product::where('id_product', $itemdetail->id_product)->update([
                    'quantity' => $checkproduct->quantity + 1,
                ]);
                $qty = 1;
                $price = (100/100 - $checkproduct->discount / 100) * $checkproduct->price;
                $subtotal = ($qty * $price);

                $itemdetail->updatedetail($itemdetail, '-' , $qty, $price);
                $itemdetail->cart->updatetotal($itemdetail->cart, '-' , $subtotal);
                return back()->with('success', "Item updated");
            } else {
                return back()->with('error', 'Quantity must exist if you want to delete, please click the delete button');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function empty($id)
    {
        $itemdetail = CartDetail::findOrFail($id);

        $itemproduct = Product::findOrFail($itemdetail->id_product);

        Product::where('id_product', $itemdetail->id_product)->update([
            'quantity' => $itemproduct->quantity + $itemdetail->quantity,
        ]);

        $itemdetail->cart->updatetotal($itemdetail->cart, '-', $itemdetail->subtotal);

        if ($itemdetail->delete()) {
            return back()->with('success', 'Item deleted');
        } else {
            return back()->with('error', 'Item failed to delete');
        }
    }
}
