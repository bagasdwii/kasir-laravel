<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use App\Models\Barang;
use App\Models\DetailRetur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DetailReturController extends Controller
{
    public function detailretur($id)
    {
        // Mengambil user yang sedang login
        $loggedInUser = Auth::user();

        // Mencari pembelian berdasarkan ID dan user yang membuat pembelian
        $data1 = Retur::where('id', $id)
                        ->where('user_id', $loggedInUser->id)
                        ->first();

        if (!$data1) {
            return redirect()->back()->with('error', 'Retur tidak ditemukan.');
        }

        // Mencari detail pembelian terkait dengan pembelian yang ditemukan
        $data = DetailRetur::where('retur_id', $id)->get();

        $dBarang = Barang::where('user_id', $loggedInUser->id)->get();
        return view('detailretur', compact('data', 'data1', 'loggedInUser', 'dBarang'));
    }
   
      
    public function tambahdetailretur(Request $request){
        $user_id = $request->user()->id;
        $retur_id = $request->input('retur_id');
        // Validasi untuk memastikan tidak ada duplikasi data
  

    
        // Jika tidak ada data yang sama, buat entri barang
        DetailRetur::create([
            'user_id' => $user_id,
            'retur_id' => $retur_id,
            'barang_id' => $request->barang_id,
            'tanggal' => $request->tanggal,
            'kembali' => $request->kembali,
            // tambahkan kolom-kolom lainnya di sini
        ]);
    
        return redirect()->route('retur')->with('success', 'Data berhasil ditambahkan.');
    }
    public function deletedetailretur($id){
        $data = DetailRetur::find($id);
        $data->delete();
        return redirect()->route('retur');

    }
}
