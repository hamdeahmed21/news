<?php

namespace App\Http\Controllers;

use App\Models\socials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = DB::table('socials')->first();
        return view('Backend.setting.social', compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Social Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('social.setting')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\socials $socials
     * @return \Illuminate\Http\Response
     */
    public function seo()
    {
        $seo = DB::table('seos')->first();
        return view('Backend.setting.seo', compact('seo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\socials $socials
     * @return \Illuminate\Http\Response
     */
    public function storeseo(Request $request, $id)
    {
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Seo Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('seo.setting')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\socials $socials
     * @return \Illuminate\Http\Response
     */
    public function prayersetting()
    {
        $prayer = DB::table('prayers')->first();
        return view('Backend.setting.prayer', compact('prayer'));
    }

    public function updateprayersetting(Request $request, $id)
    {
        $data = array();
        $data['fajr'] = $request->fajr;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['eaha'] = $request->eaha;
        $data['jummah'] = $request->jummah;
        DB::table('prayers')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Prayers Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('prayer.setting')->with($notification);
    }

    public function livetvsetting()
    {
        $livetv = DB::table('livetvs')->first();
        return view('Backend.setting.livetv', compact('livetv'));
    }

    public function updatelivetv(Request $request, $id)
    {
        $data = array();
        $data['embed_code'] = $request->embed_code;

        DB::table('livetvs')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Live Tv Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('livetv.setting')->with($notification);
    }

    public function deactivelivetv(Request $request, $id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Live Tv DeActive Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function activelivetv(Request $request, $id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Live Tv Active Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function noticesetting()
    {
        $notice = DB::table('notices')->first();
        return view('Backend.setting.notice', compact('notice'));
    }

    public function updatenotice(Request $request, $id)
    {
        $data = array();
        $data['notice'] = $request->notice;

        DB::table('notices')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Notice Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('notice.setting')->with($notification);

    }

    public function deactivenotice(Request $request, $id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'notices DeActive Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function activenotice(Request $request, $id)
    {

        DB::table('notices')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Notice Active Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function WebsiteSetting()
    {
        $website = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view('Backend.website.index', compact('website'));
    }

    public function addwebsite()
    {
        return view('Backend.website.create');
    }

    public function storewebsite(Request $request)
    {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;

        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Link Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('website.all')->with($notification);

    }

    public function editwebsite($id)
    {
        $website = DB::table('websites')->where('id', $id)->first();
        return view('Backend.website.edit', compact('website'));
    }

    public function updatewebsite(Request $request, $id)
    {

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Website Link Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('website.all')->with($notification);
    }

    public function deletewebsite($id)
    {
        DB::table('websites')->where('id', $id)->delete();
        $notification = array(
            'message' => 'websites Deleted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('website.all')->with($notification);
    }
}
