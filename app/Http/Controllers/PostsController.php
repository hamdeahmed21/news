<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->join('subcategories','posts.subcategory_id','subcategories.id')
            ->join('disctricts','posts.district_id','disctricts.id')
            ->join('subdisctricts','posts.subdistrict_id','subdisctricts.id')
            ->select('posts.*','categories.category_en','subcategories.subcategory_en','disctricts.district_en','subdisctricts.subdistrict_en')
            ->orderBy('id','desc')->paginate(5);
        return view('Backend.post.index',compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('disctricts')->get();
        return view('Backend.post.create',compact('category','district'));
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
            'category_id' => 'required',
            'district_id' => 'required',
        ]);


        $data = array();
        $data['title_ar'] = $request->title_ar;
        $data['title_en'] = $request->title_en;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_ar'] = $request->tags_ar;
        $data['tags_en'] = $request->tags_en;
        $data['details_ar'] = $request->details_ar;
        $data['details_en'] = $request->details_en;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");


        $image = $request->image;
        if ($image) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image'] = 'image/postimg/'.$image_one;
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.post')->with($notification);

        }else{
            return Redirect()->back();
        } // End Condition
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts)
    {
        //
    }
    public function GetSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);

    }


    public function GetSubDistrict($district_id){
        $sub = DB::table('subdisctricts')->where('district_id',$district_id)->get();
        return response()->json($sub);

    }
}
