<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class PenjualanController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $data = Barang::where('kodeBarang', 'LIKE', "%{$query}%")
                    ->orWhere('namaBarang', 'LIKE', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json($data);
    }


    public function penjualan()
 
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();

        // Ambil semua data Barang tanpa filter user_id
        // $data = Barang::orderBy('created_at', 'desc')->get();
        
        // Ambil semua data Categori tanpa filter user_id
        return view('penjualan', compact('loggedInUser'));
    }
    // public function tambahpenjualan(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $user_id = $request->user()->id;
    //         $tanggal = now();
    
    //         // Ambil ID penjualan baru
    //         Log::debug('Request data:', $request->all());
    //         $penjualan_id = Penjualan::create([
    //             'user_id' => $user_id,
    //             'tanggal' => $tanggal,
    //             'totalHarga' => $request->paymentData['total'] ?? 0,
    //             'uang' => $request->paymentData['bayar'] ?? 0,
    //             'kembalian' => $request->paymentData['kembalian'] ?? 0,
    //         ])->id;
    
    //         // Simpan data detail penjualan dan perbarui stok barang
    //         foreach ($request->shoppingItems as $item) {
    //             DetailPenjualan::create([
    //                 'penjualan_id' => $penjualan_id,
    //                 'barang_id' => $item['kode'],
    //                 'harga' => $item['harga'] ?? 0,
    //                 'jumlah' => $item['stok'] ?? 0,
    //                 'subTotal' => $item['subtotal'] ?? 0,
    //             ]);
                
              
              
                
    //             $barang = Barang::where('kodeBarang', $item['kode'])->first(); // Pastikan metode pencarian ini cocok dengan struktur database Anda

    //             if ($barang) {
                

    //                 $barang->stok -= $item['stok'];
    //                 $barang->save();
    //             } else {
                    
    //             }

    //         }
    
    //         DB::commit();
    
    //         return ['success' => true];
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Transaction error:', ['error' => $e->getMessage()]);
    //         return response()->json(['success' => false, 'error' => 'Transaction failed'], 500);
    //     }
    // }
    public function tambahpenjualan(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->user()->id;
            $tanggal = now();

            // Ambil ID penjualan baru
            $penjualan = Penjualan::create([
                'user_id' => $user_id,
                'tanggal' => $tanggal,
                'totalHarga' => $request->paymentData['total'] ?? 0,
                'uang' => $request->paymentData['bayar'] ?? 0,
                'kembalian' => $request->paymentData['kembalian'] ?? 0,
            ]);
            $penjualan_id = $penjualan->id;

            // Simpan data detail penjualan dan perbarui stok barang
            foreach ($request->shoppingItems as $item) {
                $barang = Barang::where('kodeBarang', $item['kode'])->first();

                if ($barang) {
                    DetailPenjualan::create([
                        'penjualan_id' => $penjualan_id,
                        'barang_id' => $barang->id, // Gunakan id dari barang yang ditemukan
                        'harga' => $item['harga'] ?? 0,
                        'jumlah' => $item['stok'] ?? 0,
                        'subTotal' => $item['subtotal'] ?? 0,
                    ]);

                    // Perbarui stok barang
                    $barang->stok -= $item['stok'];
                    $barang->save();
                } else {
                    // Barang tidak ditemukan, lakukan sesuai kebutuhan aplikasi Anda
                }
            }

            DB::commit();

            return ['success' => true];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction error:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => 'Transaction failed'], 500);
        }
    }



}
