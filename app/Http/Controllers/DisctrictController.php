<?php

namespace App\Http\Controllers;

use App\Models\disctrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisctrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = DB::table('disctricts')->orderBy('id','desc')->paginate(3);
      return view('Backend.District.index',compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.District.create');
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
            'district_ar' => 'required|unique:disctricts|max:255',
            'district_en' => 'required|unique:disctricts|max:255',
        ]);

        $data = array();
        $data['district_ar'] = $request->district_ar;
        $data['district_en'] = $request->district_en;
        DB::table('disctricts')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('district')->with($notification);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = DB::table('disctricts')->where('id',$id)->first();
        return view('Backend.District.edit',compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = array();
        $data['district_ar'] = $request->district_ar;
        $data['district_en'] = $request->district_en;
        DB::table('disctricts')->update($data);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('district')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('disctricts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('district')->with($notification);
    }
}
