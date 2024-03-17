<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            'title'=>'Home'
        ]);
        

    }
    public function about(){
        return view('about',[
            'title'=>'About'
        ]);
        

    }
    public function contact(){
        return view('contact',[
            'title'=>'Contact Us'
        ]);
        

    }
}
