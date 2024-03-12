<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class RegistrasiController extends Controller
{
    public function index(){
        return view('/registrasi');
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=> 'required|max:32',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5|max:255'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        $request->session()->flash('success','registrasi berhasil');
        return redirect('/login');
    }
}
