<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where('del_status','false')->orderBy('id','DESC')->take(4)->get();

        foreach($products as $key=>$vs){
            $image = Product::where('id',$vs->id)->first()->images;
            $images = explode(',', $image);
            $products[$key]->firstimage = $images[0];
        }

        return view('home',compact('products'));
    }

    public function about(){
        return view('about');
    }
}
