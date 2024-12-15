<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'id_cart';
    protected $table = 'cart';
    protected $guarded = [];

    public function CartDetail() {
        return $this->hasMany(CartDetail::class, 'id_cart', 'id_cart');
    }
}
