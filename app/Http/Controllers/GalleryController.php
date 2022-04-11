<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index()
    {
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('Backend.gallery.photos', compact('photo'));

    }

    public function create()
    {

        return view('Backend.gallery.createphoto');

    }

    public function store(Request $request)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;


        $image = $request->photo;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/photogallery/' . $image_one);
            $data['photo'] = 'image/photogallery/' . $image_one;
            DB::table('photos')->insert($data);

            $notification = array(
                'message' => 'Photo Inserted Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('photo.gallery')->with($notification);

        } else {
            return Redirect()->back();
        } // End Condition
    }

    public function edit($id)
    {
        $gallery = DB::table('photos')->where('id', $id)->first();
        return view('Backend.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;


        $image = $request->photo;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/photogallery/' . $image_one);
            $data['photo'] = 'image/photogallery/' . $image_one;
            DB::table('photos')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Photo updete Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('photo.gallery')->with($notification);

        } else {
            return Redirect()->back();
        }
    }

    public function delete($id)
    {
        DB::table('photos')->where('id', $id)->delete();
        return redirect()->route('photo.gallery');
    }

    public function videogallery()
    {
        $video = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
        return view('Backend.gallery.video', compact('video'));
    }

    public function addvideo()
    {
        return view('Backend.gallery.createvideo');
    }

    public function storevideo(Request $request)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->insert($data);

        $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('video.gallery')->with($notification);

    }

    public function editVideo($id)
    {
        $video = DB::table('videos')->where('id', $id)->first();
        return view('Backend.gallery.editvideo', compact('video'));
    }

    public function updatevideo(Request $request, $id)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Video updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('video.gallery')->with($notification);
    }

    public function deleteVideo($id)
    {
        DB::table('videos')->where('id', $id)->delete();
        return redirect()->route('video.gallery');
    }
}
