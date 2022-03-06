<?php

namespace App\Http\Controllers\HandmadeCategory;

use Datatables;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HandmadeCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = HandmadeCategory::where('del_status','false')->get();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'category_name'=>'required',
        ]);

        $category = new HandmadeCategory();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('categories.index')->with('status', 'Created Successful');
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
        $category = HandmadeCategory::find($id);
        return view('dashboard.categories.edit',compact('category'));
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
            'category_name'=>'required',
            ]);
            
            $category = HandmadeCategory::find($id);

        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('categories.index')->with('status','Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = HandmadeCategory::where('id', $id)->first();

        $category->del_status = 'true';
        $category->save();

        return redirect()->back()->with('status','Deleted  Success!');
    }
}
