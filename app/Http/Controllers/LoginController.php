<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title'=>'Login'
        ]);
    }
    public function authenticate(Request $request){
        $credentials=$request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required'
        ]);
        // User::create($validateData);
        // $request->session()->flash('success','registrasi berhasil');
        // return redirect('/');
        

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');

    }
    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/login');
    }
}

