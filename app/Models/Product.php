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
}
