<?php

namespace App\Models;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillables = [
        'name','category_id','type_id','images','price','instock','instock_no','waiting_time'
    ];

    public function categories(){
        return $this->belongsTo(HandmadeCategory::class,'category_id');
    }
    public function type(){
        return $this->belongsTo(ProductType::class,'type_id');
    }
    public function wishlist(){
        return $this->hasMany(ProductWishlist::class);
    }
}
