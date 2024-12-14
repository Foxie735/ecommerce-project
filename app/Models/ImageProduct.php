<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $primaryKey = 'id_img_product';
    protected $table = 'image_product';
    protected $guarded = [];

    public function Product () 
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
