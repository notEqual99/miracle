<?php

namespace App\Models;

use App\Models\HandmadeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $table = "product_types";
    protected $fillable = ['name','category_id'];

    public function category(){
        return $this->belongsTo(HandmadeCategory::class,'category_id');
    }
}
