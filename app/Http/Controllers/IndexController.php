<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Index;
use App\Models\Main;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $main = Main::first();
        $abouts = About::all();
        $contacts = Contact::all();
        return view('pages.index', compact('main', 'abouts','contacts'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $indices = new Index();
        $indices->name=$request->name;
        $indices->phone=$request->phone;
        $indices->email=$request->email;
        $indices->message=$request->message;
        $indices->save();
        return redirect()->route('pages.index')->with('message','New Student Created Successfull !');
    }
}
