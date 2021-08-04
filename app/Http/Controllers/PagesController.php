<?php

namespace App\Http\Controllers;
use App\Models\Main;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $main = Main::first();
        $abouts = About::all();
        $contacts = Contact::all();
        return view('pages.index', compact('main', 'abouts','contacts'));
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }


    public function about()
    {
       // return view('pages.about');
    }

    public function contact()
    {
      //return view('pages.contact');
    }
}
