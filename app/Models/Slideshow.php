<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $primaryKey = 'id_slideshow';
    protected $table = 'slideshow';
    protected $guarded = [];
}
