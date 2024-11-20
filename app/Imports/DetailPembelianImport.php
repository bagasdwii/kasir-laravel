<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DetailPembelianImport implements ToModel, WithHeadingRow
{
    protected $user_id;
    protected $pembelian_id;

    public function __construct($user_id,$pembelian_id)
    {
        $this->user_id = $user_id;
        $this->pembelian_id = $pembelian_id;
    }

    public function model(array $row)
    {
        // Log untuk memastikan pemrosesan dimulai dari baris yang benar
        Log::info('Memproses detail pembelian: ' . json_encode($row) . ' oleh user ' . $this->user_id);

        // Cari barang berdasarkan nama_barang
        $barang = Barang::where('namaBarang', $row['nama_barang'])->first();

        // Jika barang ditemukan
        if ($barang) {
        

            // Log setelah stok diperbarui
            Log::info('Stok barang ' . $barang->namaBarang . ' diperbarui. Stok baru: ' . $barang->stok . ' oleh user ' . $this->user_id);

            // Hitung subTotal dari harga_beli dan stok
            $subTotal = $row['harga_beli'] * $row['stok'];

            // Ambil pembelian_id dari session atau request (kamu bisa ubah sesuai kebutuhan)
            // $pembelian_id = session()->get('pembelian_id'); // Pastikan pembelian_id diambil dengan benar
            $pembelian_id = $this->pembelian_id; 

            $pembelian = Pembelian::find($pembelian_id);
            if (!$pembelian) {
                Log::error('Pembelian dengan ID ' . $pembelian_id . ' tidak ditemukan.');
                return null;
            }
            $tanggalPembelian = $pembelian->tanggal;

            // Cek apakah detail pembelian sudah ada untuk barang ini
            $detailpembelian = DetailPembelian::where('barang_id', $barang->id)
                ->where('pembelian_id', $pembelian_id)
                ->first();

            if ($detailpembelian) {
                // Update detail pembelian jika sudah ada
                // $detailpembelian->jumlah += $row['stok']; // Tambahkan stok dari excel ke jumlah pembelian sebelumnya
                // $detailpembelian->subTotal += $subTotal; // Update subTotal
                // $detailpembelian->save();
                Log::info('Detail Pembelian dengan kode ' . $row['kode_barang'] . ' sudah ada, baris diabaikan.');

                return null;
            } else {
                // Buat detail pembelian baru jika belum ada
                DetailPembelian::create([
                    'pembelian_id' => $pembelian_id, // Pastikan ini ditambahkan
                    'barang_id' => $barang->id,
                    'jumlah' => $row['stok'],
                    'user_id' => $this->user_id,
                    'harga' => $row['harga_beli'], // Harga beli dari Excel
                    'subTotal' => $subTotal, // Simpan subTotal
                    'created_at' => $tanggalPembelian,
                    'updated_at' => $tanggalPembelian,
                ]);

                Log::info('Detail pembelian baru ditambahkan untuk barang ' . $barang->namaBarang . ' oleh user ' . $this->user_id);
            }
        } else {
            // Log jika barang tidak ditemukan
            Log::warning('Barang dengan nama ' . $row['nama_barang'] . ' tidak ditemukan.');
        }

        return null; // Tidak mengembalikan model, karena ini update
    }
}
