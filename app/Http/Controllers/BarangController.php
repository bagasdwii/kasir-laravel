<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function barang()
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();
        
     
            // Jika yang login adalah admin, filter barang berdasarkan user_id
        $data = Barang::where('user_id', $loggedInUser->id)->orderBy('created_at', 'desc')->get(); 
        if ($loggedInUser->role === 'staff') {
            // Jika yang login adalah staff
            $adminUser = User::where('role', 'admin')->where('email', $loggedInUser->owner)->first(); // Cari user admin yang memiliki email yang sama dengan owner staff
            if ($adminUser) {
                // Jika admin ditemukan
                $data = Barang::where('user_id', $adminUser->id)->orderBy('created_at', 'desc')->get(); // Filter barang berdasarkan user_id admin
            }
            // Jika tidak ada admin yang cocok, maka $data tidak akan diatur
        }

        $dCategori = Categori::where('owner', $loggedInUser->email)->get();

        return view('barang', compact('data', 'loggedInUser', 'dCategori'));
    }


    // }
    public function tambahbarang(Request $request){
        // dd($request->all());

        $user_id = $request->user()->id;

        // Periksa apakah data yang sama sudah ada di database
        $existingBarang = Barang::where('user_id', $user_id)
                            ->where(function ($query) use ($request) {
                                $query->where('namaBarang', $request->namaBarang)
                                      ->orWhere('kodeBarang', $request->kodeBarang);
                            })
                            ->first();

        if ($existingBarang) {
            return redirect()->route('barang')->with('error', 'Data dengan nama dan kode barang yang sama sudah ada.');
        }

        // Jika tidak ada data yang sama, buat entri barang
        Barang::create($request->all());

        return redirect()->route('barang')->with('success', 'Data berhasil ditambahkan.');


       
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
