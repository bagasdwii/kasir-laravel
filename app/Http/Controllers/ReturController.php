<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Retur;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReturController extends Controller
{
    public function retur()
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();
        
     
            // Jika yang login adalah admin, filter barang berdasarkan user_id
        // $data = Retur::where('user_id', $loggedInUser->id)->orderBy('created_at', 'desc')->get(); 
  
        // $dPembelian = Pembelian::where('user_id', $loggedInUser->id)->get();
        // $dBarang = Barang::where('user_id', $loggedInUser->id)->get();
        $data = Retur::orderBy('created_at', 'desc')->get(); 
  
        $dPembelian = Pembelian::orderBy('created_at', 'desc')->get(); 
        
        $dBarang = Barang::orderBy('created_at', 'desc')->get(); 

        return view('retur', compact('data', 'loggedInUser', 'dPembelian','dBarang'));
    }
    public function getJumlahByDetailPembelian(Request $request)
    {
        // Ambil no faktur dan barang_id dari permintaan
        $noFaktur = $request->input('pembelian_id');
        $barangId = $request->input('barang_id');
    
        // Cari detail pembelian berdasarkan no faktur dan barang_id
        $detailPembelian = DetailPembelian::where('pembelian_id', $noFaktur)
                                          ->where('barang_id', $barangId)
                                          ->first();
    
        // Jika detail pembelian ditemukan, kembalikan jumlahnya
        if ($detailPembelian) {
            return response()->json(['jumlah' => $detailPembelian->jumlah]);
        } else {
            return response()->json(['jumlah' => 0]);
        }
    }
    

    
    public function tambahretur(Request $request){
        $user_id = $request->user()->id;
    
        // Validasi untuk memastikan tidak ada duplikasi data
    
    
        // Jika tidak ada data yang sama, buat entri barang
        Retur::create([
            'user_id' => $user_id,
            'pembelian_id' => $request->pembelian_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'kembali' => $request->kembali,
            'keterangan' => $request->keterangan,
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        return redirect()->route('retur')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
    public function tampilretur($id){
        $data = Retur::find($id);
        $loggedInUser = Auth::user();
        $loggedInOwner = Auth::user()->id; 
        // $dBarang = Barang::where('user_id', $loggedInUser->id)->get();
        $dBarang = Barang::orderBy('created_at', 'desc')->get(); 

        // dd($data);
        return view('/tampilretur', compact('data', 'loggedInUser','dBarang'));
       
    }
    public function updateretur(Request $request, $id){
        
        $data = Retur::find($id);
        $data->update($request->all());
        return redirect()->route('retur');

    }
    public function deleteretur($id){
        $data = Retur::find($id);
        $data->delete();
        return redirect()->route('retur');

    }
}
