<?php

namespace App\Http\Controllers\CustomerDashboard;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\ProductWishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $data = Cart::where('user_id', $userId)->where('status','shopping')->orderBy('id','DESC')->first();
        $cartItem = CartItem::with('product')->where('cart_id', $data->id)->orderBy('id','ASC')->get();
        $totalAmount = CartItem::where('cart_id', $data->id)->sum('amount');
        // return $cartItem;
        return view('cart', compact('data','cartItem','totalAmount'));
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
        //
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

    public function updateQuantity(Request $request, $id)
    {
        date_default_timezone_set('asia/yangon');
        $cartItem = CartItem::find($id);
        // return $cartItem;

        if($cartItem->sell_type == 'customize'){
            $amount = Product::where('id',$cartItem->product_id)->first()->customize_price;
            $waiting_times = Product::where('id',$cartItem->product_id)->first()->waiting_time;
        }else{
            $amount = Product::where('id',$cartItem->product_id)->first()->normal_price;
            $waiting_times = 0;
        }

        $updateAmount = $amount * $request->quantity;
        $updateWait = $updateAmount * $waiting_times;

        $cartItem->update([
            'quantity'=>$request->quantity,
            'amount'=>$updateAmount,
            'wait'=>$updateWait
        ]);
        return redirect()->back()->with('success','updated');
    }

    public function productCancel($id)
    {
        date_default_timezone_set('asia/yangon');
        $type = CartItem::where('id', $id)->first();
        $type->delete();

        return redirect()->back()->with('success','Cancel finished!');
    }

    public function cartBuy($id)
    {
        date_default_timezone_set('asia/yangon');
       
        $buyCart = Cart::find($id);
        $total_amount = CartItem::where('cart_id',$buyCart->id)->sum('amount');
        
        $buyCart = Cart::where('id',$id)->update([
            'final_amount'=> $total_amount,
            'ordered_date'=> now(),
            'status'=>'pending'
        ]);;

        $cartUserId = Auth::id();
        $cart = Cart::create([
            'user_id' => $cartUserId,
            'unique_key' => $this->uniqueKey($cartUserId),  
            'status' => 'shopping'
        ]);

        return redirect()->back()->with('success','Thanks for your orders, you can check orders in Cart History.');
    }

    public function cartHistory()
    {
        date_default_timezone_set('asia/yangon');
        $user_id = Auth::id();

        $carts = Cart::where('user_id',$user_id)->where('status','!=','shopping')->orderBy('id','DESC')->paginate(3);

        foreach($carts as $key=>$vs){
            $total_quantity = CartItem::where('cart_id',$vs->id)->sum('quantity');
            $waiting_times = CartItem::where('cart_id',$vs->id)->sum('wait');

            $carts[$key]->total_quantity = $total_quantity;
            $carts[$key]->waiting_times = $waiting_times;
        }

        return view('cart_history',compact('carts'));
    }

    public function cartDetail($id)
    {
        $userId = Auth::id();
        $data = Cart::where('id', $id)->first();
        $cartItem = CartItem::with('product')->where('cart_id', $id)->orderBy('id','ASC')->get();
        $totalAmount = CartItem::where('cart_id', $id)->sum('amount');
        $waiting_times = CartItem::where('cart_id', $id)->sum('wait');

        return view('cart_detail', compact('data','cartItem','totalAmount','waiting_times'));
    }

    public function wishlist()
    {
        date_default_timezone_set('asia/yangon');
        $userId = Auth::id();

        $products = ProductWishlist::with('product')->where('user_id',$userId)->orderBy('id','DESC')->paginate(3);

        foreach($products as $key => $value){
            $image = Product::where('id',$value->product->id)->first()->images;
            $images = explode(',', $image);
            $products[$key]->firstimage = $images[0];
            $products[$key]->wishlist = "true";
        }
        // return $products;

        return view('wishlist',compact('products'));
    }

    public function uniqueKey($id)
    {
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $strID = substr(str_shuffle($codeAlphabet), 0, 1);
        $strKey = mt_rand(100, 999);
        $generateID = 'U'.$strID."$id".$strKey;

        $uniqueKey = Cart::where('unique_key', $generateID)->get();
        if (count($uniqueKey) > 0) {
            $this->uniqueKey();
        } else {
            return $generateID;
        }
    }

}
