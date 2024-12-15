<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    public function __construct()
    {
        // Ensure the user is authenticated
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
         $itemcart = Cart::where('id_user', $user->id_user)
                    ->where('status_cart', 'process')
                    ->first();
        if($itemcart) {
            $data = array (
                'title' => 'Shopping Cart',
                'active' => 'cart',
                'itemcart' => $itemcart
            );
            return view('cart.index', $data)->with('no', 1);
        } else {
            echo '<script>alert("you have not added a product to your basket, please add the product first")</script>';
            echo '<script>window.location = "/"</script>';
        }
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
