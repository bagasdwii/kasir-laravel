<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    // public function barang()
    // {
    //     // Periksa peran pengguna yang login
    //     $loggedInUser = Auth::user();
        
     
    //         // Jika yang login adalah admin, filter barang berdasarkan user_id
    //     $data = Barang::where('user_id', $loggedInUser->id)->orderBy('created_at', 'desc')->get(); 
    //     if ($loggedInUser->role === 'staff') {
    //         // Jika yang login adalah staff
    //         $adminUser = User::where('role', 'admin')->where('email', $loggedInUser->owner)->first(); // Cari user admin yang memiliki email yang sama dengan owner staff
    //         if ($adminUser) {
    //             // Jika admin ditemukan
    //             $data = Barang::where('user_id', $adminUser->id)->orderBy('created_at', 'desc')->get(); // Filter barang berdasarkan user_id admin
    //         }
    //         // Jika tidak ada admin yang cocok, maka $data tidak akan diatur
    //     }

    //     $dCategori = Categori::where('user_id', $loggedInUser->id)->get();

    //     return view('barang', compact('data', 'loggedInUser', 'dCategori'));
    // }


    // }
    public function barang()
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();

        // Ambil semua data Barang tanpa filter user_id
        $data = Barang::orderBy('created_at', 'desc')->get();
        
        // Ambil semua data Categori tanpa filter user_id
        $dCategori = Categori::all();

        return view('barang', compact('data', 'loggedInUser', 'dCategori'));
    }

    public function tambahbarang(Request $request){
        $user_id = $request->user()->id;
        $categori_id = $request->input('categori_id');
    
        // Validasi untuk memastikan tidak ada duplikasi data
        $validator = Validator::make($request->all(), [
            'namaBarang' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('barangs')->where(function ($query) use ($user_id, $categori_id) {
                //     return $query->where('user_id', $user_id)
                //                  ->where('categori_id', $categori_id);
                // }),
                Rule::unique('barangs')
                    ->where('user_id', $user_id)
                    ->where('categori_id', $categori_id)
            ],
            'kodeBarang' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('barangs')->where(function ($query) use ($user_id, $categori_id) {
                //     return $query->where('user_id', $user_id)
                //                  ->where('categori_id', $categori_id);
                // }),
                Rule::unique('barangs')
                    ->where('user_id', $user_id)
                    ->where('categori_id', $categori_id)
            ],
            // tambahkan aturan validasi lainnya di sini
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Data dengan nama dan kode barang yang sama sudah ada.');
        }
    
        // Jika tidak ada data yang sama, buat entri barang
        Barang::create([
            'user_id' => $user_id,
            'categori_id' => $categori_id,
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $request->kodeBarang,
            'hargaBeli' => $request->hargaBeli,
            'hargaJual' => $request->hargaJual,
            'stok' => $request->stok,
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        return redirect()->route('barang')->with('success', 'Data berhasil ditambahkan.');
    }
    public function tambahcategori(Request $request){
        // Validasi data
        $validator = Validator::make($request->all(), [
            'namaCategori' => ['required', 'string', 'max:255', Rule::unique('categoris')->where('user_id', $request->user()->id)],
        ]);
    
        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
    
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Data dengan nama dan kode barang yang sama sudah ada.');

        }
    
        // Jika data valid, buat entri kategori
        Categori::create([
            'user_id' => $request->user()->id,
            'namaCategori' => $request->namaCategori,
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('barang')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
    public function tampilbarang($id){
        $data = Barang::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->id; 

        $dCategori =  Categori::all();
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
