<?php

namespace App\Http\Controllers;
//use App\Models\Contact;
use App\Models\Index;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indices = Index::all();
        return view('pages.contacts.index')->with('indices',$indices);
        //$contacts = Contact::paginate(10);
        //return view('pages.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('pages.contacts.create');
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
        return redirect()->route('pages.contacts.index')->with('message','New Student Created Successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indices = Index::find($id);
        return view('pages.contacts.read',compact('indices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $index = Index::find($id);
        return view('pages.contacts.edit',compact('index'));
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
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $indices =Index::find($id);
        $indices->name=$request->name;
        $indices->phone=$request->phone;
        $indices->email=$request->email;
        $indices->message=$request->message;
        $indices->save();
        return redirect()->route('pages.contacts.index')->with('message','Student Updated Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indices = Index::find($id)->delete();
        return back()->with('message','Student Deleted Successfull !');
    }
}
