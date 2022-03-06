<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWishlist extends Model
{
    use HasFactory;
    protected $table = "product_wishlist";

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
