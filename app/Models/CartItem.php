<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $fillable = [
        'id', 'cart_id', 'product_id', 'sell_type', 'quantity', 'amount'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}   
