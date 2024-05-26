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
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Verifikasi peran setelah login
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect('/barang');
            }
        }
    
        return back()->with('loginError', 'Email atau password salah');
    }
    
    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/login');
    }
   
    
}

