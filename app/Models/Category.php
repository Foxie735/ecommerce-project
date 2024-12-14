<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';
    protected $table = 'category';
    protected $guarded = [];

    public function Product ()
    {
        return $this->hasMany(Product::class, 'id_category', 'id_category');
    }
}
