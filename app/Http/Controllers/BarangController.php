<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Imports\BarangImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function uploadExcelBarang(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xls,xlsx',
        ]);
    
        $user_id = $request->user()->id;
        $file = $request->file('excelFile');
    
        // Log informasi tentang file yang diunggah
        Log::info('User ' . $user_id . ' mengupload file Excel: ' . $file->getClientOriginalName());
    
        try {
            // Proses Excel dan masukkan ke database
            Excel::import(new BarangImport($user_id), $file);
    
            // Log ketika impor selesai
            Log::info('Impor barang berhasil dilakukan oleh user ' . $user_id);
        } catch (\Exception $e) {
            // Log jika terjadi error selama proses impor
            Log::error('Gagal mengimpor barang: ' . $e->getMessage());
            return redirect()->route('barang')->with('error', 'Gagal meng-upload data barang.');
        }
    
        return redirect()->route('barang')->with('success', 'Data barang berhasil di-upload.');
    }
    public function barang(Request $request)
    {
        // Periksa peran pengguna yang login
        $loggedInUser = Auth::user();
    
        // Ambil semua data Categori tanpa filter user_id
        $dCategori = Categori::all();
    
        // Ambil semua data Barang dan terapkan filter jika ada
        $query = Barang::query();
    
        // Jika ada kategori yang dipilih
        if ($request->has('categori_id') && $request->categori_id != '') {
            $query->where('categori_id', $request->categori_id);
        }
    
        // Jika ada pencarian berdasarkan nama barang
        if ($request->has('search') && $request->search != '') {
            $query->where('namaBarang', 'like', '%' . $request->search . '%');
        }
    
        // Ambil data barang yang telah difilter
        $data = $query->orderBy('created_at', 'desc')->get();
    
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
 
                Rule::unique('barangs')
                    ->where('user_id', $user_id)
                    ->where('categori_id', $categori_id)
            ],
            'kodeBarang' => [
                'required',
                'string',
                'max:255',

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
