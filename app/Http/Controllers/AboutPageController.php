<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('pages.about', compact('about'));

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $about = About::first();
        $about->title = $request->title;
        $about->description = $request->description;

        if($request->file('image')){
            $img_file = $request->file('image');
            $img_file->storeAs('public/img/','ac_img.' . $img_file->getClientOriginalExtension());
            $about->image = 'storage/img/ac_img.' . $img_file->getClientOriginalExtension();
        }
        $about->save();
        return redirect()->route('pages.about')->with('success', "About Page data has been updated successfully");


    }

}
