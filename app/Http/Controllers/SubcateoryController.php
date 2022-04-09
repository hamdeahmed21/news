<?php

namespace App\Http\Controllers;

use App\Models\subcateory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcateoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = DB::table('subcategories')->join('categories','subcategories.category_id','categories.id')
            ->select('subcategories.*','categories.category_en')->orderBy('id','desc')->paginate(4);
        return view('Backend.subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();
        return view('Backend.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_ar' => 'required|unique:subcategories|max:255',
            'subcategory_en' => 'required|unique:subcategories|max:255',
        ]);

        $data = array();
        $data['subcategory_ar'] = $request->subcategory_ar;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('subcategory')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subcateory  $subcateory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('Backend.subcategory.edit',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subcateory  $subcateory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = array();
        $data['subcategory_ar'] = $request->subcategory_ar;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->update($data);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('subcategory')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subcateory  $subcateory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('subcategory')->with($notification);
    }
}
