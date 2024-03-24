<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function barang(){
        $loggedInOwner = Auth::user()->email; 
        $loggedInId = Auth::user()->id; 

        $data = Barang::where('user_id', $loggedInId)->get(); 
        $dCategori = Categori::where('owner', $loggedInOwner)->get(); 

        $loggedInUser = Auth::user(); // Mengambil data user yang sedang login
        return view('barang', compact('data', 'loggedInUser', 'dCategori')); // Mengirim data ke view
    }

    // public function tambah(){
    //     $loggedInUser = Auth::user();
    //     return view('/tambahbarang')->with('loggedInUser', $loggedInUser);
     
    // }
    public function tambahbarang(Request $request){
        // dd($request->all());
        Barang::create($request->all());
     
        return redirect()->route('barang');
       
    }
    public function tambahcategori(Request $request){
        // dd($request->all());
        Categori::create($request->all());
        return redirect()->route('barang');
       
    }
    public function tampilbarang($id){
        $data = Barang::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->email; 

        $dCategori = Categori::where('owner', $loggedInOwner)->get(); 
        // dd($data);
        return view('/tampilbarang', compact('data', 'loggedInUser', 'dCategori'));
       
    }
    public function updatebarang(Request $request, $id){
        
        $data = Barang::find($id);
        $data->update($request->all());
        return redirect()->route('barang');

    }
    public function deletebarang($id){
        $data = Barang::find($id);
        $data->delete();
        return redirect()->route('barang');

    }
    public function deletecategori($id){
        $dCategori = Categori::find($id);
        $dCategori->delete();
        return redirect()->route('barang');

    }
    
}
