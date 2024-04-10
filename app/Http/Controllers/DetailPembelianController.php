<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\Auth;

class DetailPembelianController extends Controller
    {


      

        public function detailpembelian($id)
{
    // Mengambil user yang sedang login
    $loggedInUser = Auth::user();

    // Mencari pembelian berdasarkan ID dan user yang membuat pembelian
    $data1 = Pembelian::where('id', $id)
                      ->where('user_id', $loggedInUser->id)
                      ->first();

    if (!$data1) {
        return redirect()->back()->with('error', 'Pembelian tidak ditemukan.');
    }

    // Mencari detail pembelian terkait dengan pembelian yang ditemukan
    $data = DetailPembelian::where('pembelian_id', $id)->get();

    $dBarang = Barang::where('user_id', $loggedInUser->id)->get();
    return view('detailpembelian', compact('data', 'data1', 'loggedInUser', 'dBarang'));
}

        
}