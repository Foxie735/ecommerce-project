<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $table = 'product';
    protected $guarded = [];

    public function Category () 
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function ImageProduct ()
    {
        return $this->hasMany(ImageProduct::class, 'id_product', 'id_product');
    }

    public function Cart() {
        return $this->hasMany(Cart::class, 'id_product', 'id_product');
    }
}
