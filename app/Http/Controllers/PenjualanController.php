<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PenjualanController extends Controller
{
    public function penjualan()
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

        return view('penjualan', compact('data', 'loggedInUser'));
    }
    public function tambahpenjualan(Request $request)
    {
        // dd($request->all());

        $user_id = $request->user()->id;
        $tanggal = now();
        // Ambil ID penjualan baru
        Log::debug('request', [$request->all()]);
        $penjualan_id = Penjualan::create([
            'user_id' => $user_id,
            'tanggal' => $tanggal,
            'totalHarga' => $request->paymentData['total'] ?? 0,
            'uang' => $request->paymentData['bayar'] ?? 0,
            'kembalian' => $request->paymentData['kembalian'] ?? 0,
        ])->id;

        // Simpan data detail penjualan
        foreach ($request->shoppingItems as $item) {
            DetailPenjualan::create([
                'penjualan_id' => $penjualan_id,
                'barang_id' => $item['kode'],
                'harga' => $item['harga']?? 0,
                'jumlah' => $item['stok']?? 0,
                'subTotal' => $item['subtotal']?? 0,
            ]);
        }

        // Redirect ke halaman penjualan atau sesuai kebutuhan Anda
        // return redirect()->route('penjualan');
        return ['success' => true];
    }


}
