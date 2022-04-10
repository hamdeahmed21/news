<?php

namespace App\Http\Controllers;

use App\Models\subdisctrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubdisctrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdistrict = DB::table('subdisctricts')
            ->join('disctricts','subdisctricts.district_id','disctricts.id')
            ->select('subdisctricts.*','disctricts.district_en')
            ->orderBy('id','desc')->paginate(4);
        return view('Backend.subdistrict.index',compact('subdistrict'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = DB::table('disctricts')->get();
        return view('Backend.subdistrict.create',compact('district'));
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
            'subdistrict_ar' => 'required|unique:subdisctricts|max:255',
            'subdistrict_en' => 'required|unique:subdisctricts|max:255',
        ]);

        $data = array();
        $data['subdistrict_ar'] = $request->subdistrict_ar;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['district_id'] = $request->district_id;
        DB::table('subdisctricts')->insert($data);

        $notification = array(
            'message' => 'SubDistrict Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('subdistrict')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subdisctrict  $subdisctrict
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subdistrict = DB::table('subdisctricts')->where('id',$id)->first();
        $district = DB::table('disctricts')->get();
        return view('Backend.subdistrict.edit',compact('subdistrict','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subdisctrict  $subdisctrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = array();
        $data['subdistrict_ar'] = $request->subdistrict_ar;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['district_id'] = $request->district_id;
        DB::table('subdisctricts')->update($data);

        $notification = array(
            'message' => 'SubDistrict updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('subdistrict')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subdisctrict  $subdisctrict
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subdisctricts')->where('id',$id)->delete();

        $notification = array(
            'message' => 'SubDistrict Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->route('subdistrict')->with($notification);
    }
}
