<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.media.create');
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

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

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

        $photo = Photo::findOrFail($id);

        unlink(public_path(). $photo->file);

       // return $photo->getAttribute('file');

        $photo->delete();

        Session::flash('deleted_pic','The picture has been deleted');

        //return redirect('admin/media');
    }


    public function deleteMedia(Request $request){


        if (isset($request->delete_single)) {

            return "inside" . $request->fil . ", and id =" . $request->delete_single;

//            $this->destroy($request->photo);

//             return "inside if";

            $photo = Photo::findOrFail($request->photo);

            return "id is :". $photo->id . ", and the coming id: " . $request->photo;

            unlink(public_path(). $photo->file);

           // return $photo->getAttribute('file');

            $photo->delete();

            Session::flash('deleted_pic','The picture has been deleted');

            return redirect()->back();

        }elseif (isset($request->delete_selected) && !empty($request->checkboxArray)){

//            return "inside if all";

            $photos = Photo::findOrFail($request->checkboxArray);

            foreach ($photos as $photo){

                unlink(public_path(). $photo->file);

                $photo->delete();

            }

            Session::flash('deleted_pic','Pictures has been deleted');

            return redirect()->back();

        } else {


            return redirect()->back();
        }

//
//        $photos = Photo::findOrFail($request->checkboxArray);
//
//        foreach ($photos as $photo){
//
//             $photo->delete();
//
//        }
//
//        return redirect()->back();

    }
}
