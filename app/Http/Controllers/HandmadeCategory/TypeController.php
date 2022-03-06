<?php

namespace App\Http\Controllers\HandmadeCategory;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\HandmadeCategory;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProductType::where('del_status','0')->get();
        return view('dashboard.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = HandmadeCategory::where('del_status','false')->get();
        return view('dashboard.types.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('asia/yangon');
        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required'
        ]);

        $type = new ProductType();
        $type->name = $request->name;
        $type->category_id = $request->category_id;

        $type->save();

        return redirect()->route('types.index')->with('status', 'Created Successful');
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
        $type = ProductType::find($id);
        $categories = HandmadeCategory::where('del_status','false')->get();
        return view('dashboard.types.edit',compact('type','categories'));
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
            'category_id'=>'required'
            ]);
            
            $type = ProductType::find($id);

        $type->name = $request->name;
        $type->category_id = $request->category_id;
        $type->save();

        return redirect()->route('types.index')->with('status','Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set('asia/yangon');
        $type = ProductType::where('id', $id)->first();

        $type->del_status = '1';
        $type->save();

        return redirect()->back()->with('status','Deleted  Success!');
    }
}
