<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSizes;

class VariantStock extends Model
{
    use HasFactory;

    protected $table = 'variant_stock';

    protected $fillable = [
        'variant_id',
        'size_id',
        'stock',
    ];

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'size_id');
    }
}