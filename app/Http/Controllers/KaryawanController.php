<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function karyawan(){
        $data = User::all();
        return view('/karyawan', compact('data'));
    }
    public function tambah(){
        $loggedInUser = Auth::user();
        return view('/tambahkaryawan')->with('loggedInUser', $loggedInUser);
     
    }
    public function tambahdata(Request $request){
        // dd($request->all());
        User::create($request->all());
        return redirect()->route('karyawan');
       
    }
    public function tampilkaryawan($id){
        $data = User::find($id);
        // dd($data);
        return view('/tampilkaryawan', compact('data'));
       
    }
    public function updatekaryawan(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('karyawan');

    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('karyawan');

    }
}
