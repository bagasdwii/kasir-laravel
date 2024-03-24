<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();

        return view('/dashboard')->with('loggedInUser', $loggedInUser);
    }
    
    
}
