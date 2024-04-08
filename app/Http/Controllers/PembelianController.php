<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    public function pembelian()
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();
        
     
            // Jika yang login adalah admin, filter barang berdasarkan user_id
        $data = Pembelian::where('user_id', $loggedInUser->id)->orderBy('created_at', 'desc')->get(); 
        $dSupplier = Supplier::where('user_id', $loggedInUser->id)->get();
        return view('pembelian', compact('data', 'loggedInUser','dSupplier'));
    }


    // }
    public function tambahpembelian(Request $request){
        $user_id = $request->user()->id;
        $supplier_id = $request->input('supplier_id');
        // Validasi untuk memastikan tidak ada duplikasi data
        $validator = Validator::make($request->all(), [
            'noFaktur' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('barangs')->where(function ($query) use ($user_id, $categori_id) {
                //     return $query->where('user_id', $user_id)
                //                  ->where('categori_id', $categori_id);
                // }),
                Rule::unique('pembelians')
                    ->where('user_id', $user_id)
            ],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Data dengan no faktur yang sama sudah ada.');
        }
    
        // Jika tidak ada data yang sama, buat entri barang
        Pembelian::create([
            'user_id' => $user_id,
            'supplier_id' => $supplier_id,
            'noFaktur' => $request->noFaktur,
            'tanggal' => $request->tanggal,
            'totalHarga' => $request->totalHarga
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        return redirect()->route('pembelian')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
    
    public function tampilpembelian($id){
        $data = Pembelian::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->id; 
        
        return view('/tampilpembelian', compact('data', 'loggedInUser'));
       
    }
    public function updatepembelian(Request $request, $id){
        
        $data = Pembelian::find($id);
        $data->update($request->all());
        return redirect()->route('pembelian');

    }
    public function deletepembelian($id){
        $data = Pembelian::find($id);
        $data->delete();
        return redirect()->route('pembelian');

    }
    public function detailpembelian($id){
        $data = Pembelian::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->id; 

        return view('/detailpembelian', compact('data', 'loggedInUser'));
       
    }
   
}
