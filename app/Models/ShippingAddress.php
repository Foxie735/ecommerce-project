<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $primaryKey = 'id_shipping_address';
    protected $table = 'shipping_address';
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }
}
