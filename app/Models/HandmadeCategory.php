<?php

namespace App\Models;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HandmadeCategory extends Model
{
    use HasFactory;

    protected $table = "product_categories";
    protected $fillable = ['name'];
}
