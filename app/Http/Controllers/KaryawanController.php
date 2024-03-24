<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function karyawan(){
        $loggedInOwner = Auth::user()->email; // Mengambil owner dari user yang sedang login
        $data = User::where('owner', $loggedInOwner)->get(); // Mengambil semua data user dengan owner yang sesuai
        $loggedInUser = Auth::user(); // Mengambil data user yang sedang login
        return view('karyawan', compact('data', 'loggedInUser')); // Mengirim data ke view
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
        $loggedInUser = Auth::user();

        // dd($data);
        return view('/tampilkaryawan', compact('data', 'loggedInUser'));
       
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
