<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    // PASTIIN INI ADA 's' NYA SESUAI PHP_MYADMIN LU
    protected $table = 'products_variants'; 
    protected $fillable = [
        'product_id', 
        'color_name',
        'color_code'
    ];
}
