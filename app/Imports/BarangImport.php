<?php

namespace App\Imports;


use App\Models\Barang;
use App\Models\Categori;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class BarangImport implements ToModel,WithHeadingRow
{
   
    protected $user_id;
    
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function model(array $row)
    {
        // Log untuk memastikan pemrosesan dimulai dari baris yang benar
        Log::info('Memproses baris: ' . json_encode($row) . ' oleh user ' . $this->user_id);

        $categori = Categori::firstOrCreate(['namaCategori' => $row['kategori']], ['user_id' => $this->user_id]);

        if ($categori->wasRecentlyCreated) {
            Log::info('Kategori baru dibuat: ' . $row['namacategori']);
        }
         // Cek apakah barang dengan kode yang sama sudah ada
        $existingBarang = Barang::where('kodeBarang', $row['kode_barang'])->first();
        if ($existingBarang) {
            // Log jika barang sudah ada dan abaikan baris ini
            Log::info('Barang dengan kode ' . $row['kode_barang'] . ' sudah ada, baris diabaikan.');
            return null; // Abaikan baris ini
        }
        $barang = new Barang([
            'user_id' => $this->user_id,
            'namaBarang' => $row['nama_barang'],
            'categori_id' => $categori->id,
            'kodeBarang' => $row['kode_barang'],
            'hargaBeli' => $row['harga_beli'],
            'hargaJual' => $row['harga_jual'],
            'stok' => 0, // Stok tidak dimasukkan dari excel
        ]);

        Log::info('Barang baru ditambahkan: ' . $barang->namaBarang . ' oleh user ' . $this->user_id);

        return $barang;
    }
   
}

