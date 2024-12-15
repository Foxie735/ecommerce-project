<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartDetail extends Model
{
    protected $primaryKey = 'id_cart_detail';
    protected $table = 'cart_detail';
    protected $guarded = [];

    public function Cart() {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function Product() {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function updatedetail($itemdetail, $operator, $qty, $price) {
        if($operator == '+') {
            $this->attributes['quantity'] = $itemdetail->quantity + $qty;
        } else {
            $this->attributes['quantity'] = $itemdetail->quantity - $qty;
        }
        if($operator == '+') {
            $this->attributes['subtotal'] = $itemdetail->subtotal + $price;
        } else {
            $this->attributes['subtotal'] = $itemdetail->subtotal - $price;
        }
        self::save();
    }
}
