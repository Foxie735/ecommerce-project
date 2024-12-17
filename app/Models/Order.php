<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $table = 'order';
    protected $guarded = [];

    public function Cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }
}
