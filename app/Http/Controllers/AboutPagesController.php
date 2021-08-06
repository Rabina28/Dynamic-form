<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('crud.index',compact('students'));
        $abouts= About::paginate(10);
        return view('pages.abouts.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',

        ]);
        $abouts = new About();
        $abouts->title=$request->title;
        $abouts->image=$request->image;
        $abouts->description=$request->description;

        $image_file= $request->file('image');
        Storage::putFile('public/img/', $image_file);
        $abouts->image= "storage/img/".$image_file->hashName();
        $abouts->save();
        return redirect()->route('pages.abouts.index')->with('message','New about Created Successfull !');
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
        $about = About::find($id);
        return view('pages.abouts.edit',compact('about'));
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
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $abouts= About::find($id);
        $abouts->title = $request->title;
        $abouts->description = $request->description;

        if($request->file('image')){
            $image_file= $request->file('image');
            Storage::putFile('public/img/', $image_file);
            $abouts->image= "storage/img/".$image_file->hashName();
        }
        $abouts->save();
        return redirect()->route('pages.abouts.index')->with('success', "About Page data has been updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = About::find($id)->delete();
        return back()->with('message','About data Deleted Successfull !');
    }
}
