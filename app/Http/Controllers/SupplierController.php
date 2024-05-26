<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    // public function supplier()
    // {
    //     // Periksa peran pengguna yang login
    //     $loggedInUser = Auth::user();
        
     
    //         // Jika yang login adalah admin, filter barang berdasarkan user_id
    //     $data = Supplier::where('user_id', $loggedInUser->id)->orderBy('created_at', 'desc')->get(); 
    //     if ($loggedInUser->role === 'staff') {
    //         // Jika yang login adalah staff
    //         $adminUser = User::where('role', 'admin')->where('email', $loggedInUser->owner)->first(); // Cari user admin yang memiliki email yang sama dengan owner staff
    //         if ($adminUser) {
    //             // Jika admin ditemukan
    //             $data = Supplier::where('user_id', $adminUser->id)->orderBy('created_at', 'desc')->get(); // Filter barang berdasarkan user_id admin
    //         }
    //         // Jika tidak ada admin yang cocok, maka $data tidak akan diatur
    //     }

    //     return view('supplier', compact('data', 'loggedInUser'));
    // }
    public function supplier()
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();

        // Ambil semua data Barang tanpa filter user_id
        $data = Supplier::orderBy('created_at', 'desc')->get();
        
      

        return view('supplier', compact('data', 'loggedInUser'));
    }

    
    public function tambahsupplier(Request $request){
        $user_id = $request->user()->id;
    
        // Validasi untuk memastikan tidak ada duplikasi data
        $validator = Validator::make($request->all(), [
            'namaToko' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('barangs')->where(function ($query) use ($user_id, $categori_id) {
                //     return $query->where('user_id', $user_id)
                //                  ->where('categori_id', $categori_id);
                // }),
                Rule::unique('suppliers')
                    ->where('user_id', $user_id)
             
            ],

            'noKontak' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('barangs')->where(function ($query) use ($user_id, $categori_id) {
                //     return $query->where('user_id', $user_id)
                //                  ->where('categori_id', $categori_id);
                // }),
                Rule::unique('suppliers')
                    ->where('user_id', $user_id)
               
            ],

            // tambahkan aturan validasi lainnya di sini
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Data dengan nama TOKO sudah ada.');
        }
    
        // Jika tidak ada data yang sama, buat entri barang
        Supplier::create([
            'user_id' => $user_id,
            'namaToko' => $request->namaToko,
            'noKontak' => $request->noKontak,
            'alamat' => $request->alamat,
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        return redirect()->route('supplier')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
    public function tampilsupplier($id){
        $data = Supplier::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->id; 

        // dd($data);
        return view('/tampilsupplier', compact('data', 'loggedInUser'));
       
    }
    public function updatesupplier(Request $request, $id){
        
        $data = Supplier::find($id);
        $data->update($request->all());
        return redirect()->route('supplier');

    }
    public function deletesupplier($id){
        $data = Supplier::find($id);
        $data->delete();
        return redirect()->route('supplier');

    }
    
}

