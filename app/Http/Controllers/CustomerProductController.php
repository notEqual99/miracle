<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\ProductWishlist;
use App\Models\HandmadeCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Input;

class CustomerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchByName(Request $request){
        date_default_timezone_set('asia/yangon');

        $q = Input::get ( 'q' );
        $categories = HandmadeCategory::where('del_status','false')->orderBy('id','DESC')->get();
        $types = ProductType::where('del_status','0')->orderBy('id','DESC')->get();

        if($q == !null){
            $products = Product::with('categories')->where('name','LIKE','%'.$q.'%')->orderBy('id','DESC')->paginate(10);
            foreach($products as $key=>$vs){
                $image = Product::where('id',$vs->id)->first()->images;
                $images = explode(',', $image);
                $products[$key]->firstimage = $images[0];
            }
    
            if(count($products) > 0){
                return view('products',compact('products','categories','types'))->withDetails($products)->withQuery ( $q );
            }else{
                return view ('products',compact('products','categories','types'))->withMessage('No Details found. Try to search again !');
            } 
        }

    }
    
    public function searchByFilter(Request $request){
        date_default_timezone_set('asia/yangon');

        $product = new Product;
        if(request('category_id') != "0"){
            if(request()->has('category_id'))
            {
                $product = $product->where('category_id', request('category_id'));
            }
        }
        if(request('type_id') != "0"){
            if(request()->has('type_id'))
            {
                $product = $product->where('type_id', request('type_id'));
            }
        }
        if(request('sell_type') != "0"){
            if(request()->has('sell_type'))
            {
                if(request('sell_type') == 'normal'){
                    $product = $product->where('instock', 'true');
                }elseif(request('sell_type') == 'customize'){
                    $product = $product->where('customize', 'true');
                }else{
                    $product = $product->where('instock', 'true')->where('customize', 'true');
                }
               
            }
        }
    
        $products = $product->where('del_status','false')->orderBy('id','DESC')->paginate(10);
        $categories = HandmadeCategory::where('del_status','false')->orderBy('id','DESC')->get();
        $types = ProductType::where('del_status','0')->orderBy('id','DESC')->get();
    
        if(auth()->guard('customer')->user()){
            $user_id = auth()->guard('customer')->user()->id;
        }else{
            $user_id = 0;
        }

        foreach($products as $key=>$vs){
            $image = Product::where('id',$vs->id)->first()->images;
            $images = explode(',', $image);
            $products[$key]->firstimage = $images[0];

            if(ProductWishlist::where('user_id',$user_id)->where('product_id',$vs->id)->count()>0){
                $products[$key]->wishlist = "true";
            }else{
                $products[$key]->wishlist = "false";
            }
        }

        // return $products;
        return view('products',compact('products','categories','types'));
    }

    public function index()
    {
        date_default_timezone_set('asia/yangon');
        $products = Product::where('del_status','false')->orderBy('id','DESC')->paginate(9);
        $categories = HandmadeCategory::where('del_status','false')->orderBy('id','DESC')->get();
        $types = ProductType::where('del_status','0')->orderBy('id','DESC')->get();

        if(auth()->guard('customer')->user()){
            $user_id = auth()->guard('customer')->user()->id;
        }else{
            $user_id = 0;
        }
        
        foreach($products as $key=>$vs){
            $image = Product::where('id',$vs->id)->first()->images;
            $images = explode(',', $image);
            $products[$key]->firstimage = $images[0];

            if(ProductWishlist::where('user_id',$user_id)->where('product_id',$vs->id)->count()>0){
                $products[$key]->wishlist = "true";
            }else{
                $products[$key]->wishlist = "false";
            }
        }
        // return $products;
        return view('products',compact('products','categories','types'));
    }

    public function getUserId(){
        $user_id = Auth::id();
        return $user_id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->guard('customer')->check()){
            // return "ok";
            if(auth()->guard('customer')->user()->id > 0){
                $user_id = auth()->guard('customer')->user()->id;
                if(ProductWishlist::where('user_id',$user_id)->where('product_id',$id)->count()>0){
                    $wishlist = "true";
                }else{
                    $wishlist = "false";
                }
            }else{
                $wishlist = "false";
            }
        }else{
            // return "ok";
            $wishlist = "false";
        }


        $product = Product::find($id);
        $image = Product::where('id',$id)->first()->images;
        $images = explode(',', $image);
        $imgCount = count($images);
        

        $product['wishlist'] = $wishlist;
        // return $product;
        return view('product_detail',compact('product','imgCount','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToWishlist(Request $request, $id)
    {
        date_default_timezone_set('asia/yangon');
        $user_id = Auth::user()->id;
        
        if(ProductWishlist::where('user_id',$user_id)->where('product_id',$id)->count()>0){
            return redirect()->back()->with('error','Wishlist already added.');
        }
        $wishlist = new ProductWishlist();
        $wishlist->user_id = $user_id;
        $wishlist->product_id = $id;
        $wishlist->save();

        return redirect()->back()->with('success','Wishlist added.');
    }

    public function removeWishlist($id)
    {
        date_default_timezone_set('asia/yangon');
        $user_id = Auth::user()->id;
        // return $user_id;

        if(ProductWishlist::where('user_id',$user_id)->where('product_id',$id)->count()>0){
            $remove = ProductWishlist::where('user_id',$user_id)
                            ->where('product_id',$id)
                            ->first()->delete();
        }
        
        return redirect()->back()->with('success','Wishlist removed.');
    }

    public function addToCartNormal(Request $request, $productId)
    {
        date_default_timezone_set('asia/yangon');
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id',$user_id)->where('status','shopping')->first()->id;
        // return $cart_id;
        $price = Product::where('id', $productId)->first()->normal_price;
        $amount = $request->quantity * $price;
        $waiting_times = 0;

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart_id;
        $cartItem->product_id = $productId;
        $cartItem->sell_type = 'normal';
        $cartItem->quantity = $request->quantity;
        $cartItem->amount = $amount;
        $cartItem->wait = $waiting_times;
        $cartItem->save();

        return redirect()->back()->with('success','Added cart');
    }

    public function addToCartCustomize(Request $request, $productId)
    {
        date_default_timezone_set('asia/yangon');
        // return $request;
        $user_id = Auth::user()->id;
        $cart_id = Cart::where('user_id',$user_id)->where('status','shopping')->first()->id;
        $price = Product::where('id', $productId)->first()->customize_price;
        $amount = $request->quantity * $price;
        $waiting_times = Product::where('id', $productId)->first()->waiting_time;
        $totalWaitingTimes = ($request->quantity) * $waiting_times;
        // dd($request->all());
        // return $totalWaitingTimes;

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart_id;
        $cartItem->product_id = $productId;
        $cartItem->sell_type = 'customize';
        $cartItem->quantity = $request->quantity;
        $cartItem->amount = $amount;
        $cartItem->wait = $totalWaitingTimes;
        $cartItem->save();

        return redirect()->back()->with('success','Added cart');
    }

    
}
