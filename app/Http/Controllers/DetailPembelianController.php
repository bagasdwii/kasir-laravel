<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\DetailPembelian;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Imports\DetailPembelianImport;
use Illuminate\Support\Facades\Validator;

class DetailPembelianController extends Controller
{
        public function uploadExcelPembelian(Request $request)
        {
            $request->validate([
                'excelFile' => 'required|mimes:xls,xlsx',
            ]);

            $user_id = $request->user()->id;
            $file = $request->file('excelFile');
            $pembelian_id = $request->input('pembelian_id');
            // Log informasi tentang file yang diunggah
            Log::info('User ' . $user_id . ' mengupload file Excel untuk pembelian: ' . $file->getClientOriginalName());

            try {
                // Proses Excel untuk memperbarui stok
                Excel::import(new DetailPembelianImport($user_id, $pembelian_id), $file);

                // Log ketika impor selesai
                Log::info('Impor pembelian berhasil dilakukan oleh user ' . $user_id);
            } catch (\Exception $e) {
                // Log jika terjadi error selama proses impor
                Log::error('Gagal mengimpor pembelian: ' . $e->getMessage());
                return redirect()->route('pembelian')->with('error', 'Gagal meng-upload data pembelian.');
            }

            return redirect()->route('pembelian')->with('success', 'Data pembelian berhasil di-upload.');
        }

        public function detailpembelian($id)
        {
            // Mengambil user yang sedang login
            $loggedInUser = Auth::user();

            // Mencari pembelian berdasarkan ID dan user yang membuat pembelian
            $data1 = Pembelian::where('id', $id)
                            // ->where('user_id', $loggedInUser->id)
                            ->first();

            if (!$data1) {
                return redirect()->back()->with('error', 'Pembelian tidak ditemukan.');
            }

            // Mencari detail pembelian terkait dengan pembelian yang ditemukan
            $data = DetailPembelian::where('pembelian_id', $id)->get();

            // $dBarang = Barang::where('user_id', $loggedInUser->id)->get();
            $dBarang = Barang::orderBy('created_at', 'desc')->get(); 
            
            return view('detailpembelian', compact('data', 'data1', 'loggedInUser', 'dBarang'));
        }
        public function getHarga($id)
        {
            $barang = Barang::findOrFail($id);
            return response()->json(['hargaBeli' => $barang->hargaBeli]);
        }

        public function tambahdetailpembelian(Request $request)
        {
            $user_id = $request->user()->id;
            $pembelian_id = $request->input('pembelian_id');
            $barang_id = $request->input('barang_id');
        
            // Validasi untuk memastikan tidak ada duplikasi data
            $existingDetail = DetailPembelian::where('pembelian_id', $pembelian_id)
                ->where('barang_id', $barang_id)
                ->first();
        
            if ($existingDetail) {
                // Jika data dengan barang_id yang sama sudah ada, kembalikan pesan error
                return redirect()->route('pembelian')->with('error', 'Barang sudah ada pada detail pembelian.');
            }
            $pembelian = Pembelian::find($pembelian_id);
            $tanggalPembelian = $pembelian->tanggal;
            // Jika tidak ada data yang sama, buat entri barang
            DetailPembelian::create([
                'user_id' => $user_id,
                'pembelian_id' => $pembelian_id,
                'barang_id' => $barang_id,
                'jumlah' => $request->input('jumlah'),
                'harga' => $request->input('harga'),
                'subTotal' => $request->input('subTotal'),
                'created_at' => $tanggalPembelian,
                'updated_at' => $tanggalPembelian,
                // tambahkan kolom-kolom lainnya di sini
            ]);
        
            return redirect()->route('pembelian')->with('success', 'Data berhasil ditambahkan.');
        
        
        }
        public function deletedetailpembelian($id){
            $data = DetailPembelian::find($id);
            $data->delete();
            return redirect()->route('pembelian');
    
        }
}