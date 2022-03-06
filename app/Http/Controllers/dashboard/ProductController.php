<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\HandmadeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::where('del_status','false')->orderBy('id','desc')->get();

        foreach($data as $key=>$vs){
            $image = Product::where('id',$vs->id)->first()->images;
            $images = explode(',', $image);
            $data[$key]->firstimage = $images[0];
        }

        return view('dashboard.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = HandmadeCategory::where('del_status','false')->get();
        return view('dashboard.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        date_default_timezone_set('asia/yangon');
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'category'=>'required',
            'type'=>'required',
            // 'image'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if($request->instock == 'false'){
            $instock_price = 0;
            $instock_no = 0;
        }else{
            $instock_price = request()->normal_price;
            $instock_no = request()->quantity;
        }
        if($request->customize == 'false'){
            $customize_price = 0;
            $waiting_time = 0;
        }else{
            $customize_price = request()->customize_price;
            $waiting_time = request()->waiting_time;
        }

        $img_arr = [];
        foreach(request()->file('images') as $file){
            $filenamewithextension = $file->getClientOriginalName(); //get filename with extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME); //get filename without extension
            $extension = $file->getClientOriginalExtension(); //get file extension
            $filenametostore = uniqid() . '_' . $filename . '.' . $extension; //filename to store
            
            //Resize image here
            $destinationPath = public_path('/images/products/');
            $thumbnailpath = public_path('/images/products/thumbnail/'.$filenametostore);
            $img = Image::make($file)->resize(500, 500, function($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailpath);
            
            $file->move($destinationPath, $filenametostore);
            array_push($img_arr,$filenametostore);
        }

        $product = new Product();
        $product->name = request()->name;
        $product->category_id = request()->category;
        $product->type_id = request()->type;
        $product->images = implode(',',$img_arr);
        $product->normal_price = $instock_price;
        $product->customize_price = $customize_price;
        $product->instock = request()->instock;
        $product->customize = request()->customize;
        $product->instock_no = $instock_no;
        $product->waiting_time = $waiting_time;
        $product->save();
        return redirect(route('products.index'))->with('status','Product Created Success!');
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
        date_default_timezone_set('asia/yangon');
        $product = Product::find($id);
        $image = $product->images;
        $images = explode(',', $image);

        $categories = HandmadeCategory::where('del_status','false')->get();
        return view('dashboard.products.edit',compact('product','categories','images'));
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
        date_default_timezone_set('asia/yangon');
        $this->validate($request, [
            'name'=>'required',
            'category'=>'required',
            'type'=>'required',
            // 'image'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            $product = Product::find($id);
            // return $request;

            // deleting old images in post if change with new photos
            if(request()->file('images')){
                $images = $product->images;
                $imagesAry = explode(',', $images);

                if(count($imagesAry)>1){
                    // deleting one or more old images
                    foreach($imagesAry as $value){
                        $path = public_path()."/images/products/" . $value;
                        File::delete($path);
                    }
                }else{
                    // deleting one old image
                    $path = public_path()."/images/products/" . $product->images;
                    File::delete($path);
                }

                $img_arr = [];
                foreach(request()->file('images') as $file){
                    $filenamewithextension = $file->getClientOriginalName(); //get filename with extension
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME); //get filename without extension
                    $extension = $file->getClientOriginalExtension(); //get file extension
                    $filenametostore = uniqid() . '_' . $filename . '.' . $extension; //filename to store
                    
                    //Resize image here
                    $destinationPath = public_path('/images/products/');
                    $thumbnailpath = public_path('/images/products/thumbnail/'.$filenametostore);
                    $img = Image::make($file)->resize(500, 500, function($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbnailpath);
                    
                    $file->move($destinationPath, $filenametostore);
                    array_push($img_arr,$filenametostore);
                }

            }else{
                $img_arr = $product->images;
            }
            
        $product->name = request()->name;
        $product->category_id = request()->category;
        $product->type_id = request()->type;
        $product->images = implode(',',(array)$img_arr);
        $product->normal_price = request()->normal_price;
        $product->customize_price = request()->customize_price;
        $product->instock = request()->instock;
        $product->customize = request()->customize;
        $product->instock_no = request()->quantity;
        $product->waiting_time = request()->waiting_time;
        $product->save();

        return redirect()->route('products.index')->with('status','Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        $product->del_status = '1';
        $product->save();

        return redirect()->back()->with('status','Deleted  Success!');
    }

    // get type of handmade
    public function getType($id)
    {
        $type = ProductType::where('category_id',$id)->get();
        return response()->json($type);
    }
}
