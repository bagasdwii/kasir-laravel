<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();
        $bulanSaatIni = date('m');
        $tahunSaatIni = date('Y');
        // Mengambil data penjualan per bulan dari database
        $penjualanPerBulan2 = Penjualan::selectRaw('MONTH(tanggal) as bulan, SUM(totalHarga) as total')
        ->whereYear('tanggal', $tahunSaatIni)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        // Inisialisasi array untuk data bulan dan total penjualan
        $labels = [];
        $data = [];

        // Inisialisasi data untuk setiap bulan dari Januari hingga Desember
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $labels[] = date('M', mktime(0, 0, 0, $bulan, 1)); // Format bulan singkat (Jan, Feb, dst.)
            $data[] = 0; // Inisialisasi total penjualan untuk setiap bulan dengan nilai 0
        }

        // Mengisi data total penjualan dari hasil query database
        foreach ($penjualanPerBulan2 as $penjualan) {
            $data[$penjualan->bulan - 1] = $penjualan->total; // Menggunakan bulan-1 karena index dimulai dari 0
        }
        // Mengambil total penjualan untuk bulan saat ini
        $totalPenjualan = Penjualan::whereYear('tanggal', $tahunSaatIni)
            ->whereMonth('tanggal', $bulanSaatIni)
            ->sum('totalHarga');

        // Mengambil total pembelian untuk bulan saat ini
        $totalPembelian = Pembelian::whereYear('tanggal', $tahunSaatIni)
            ->whereMonth('tanggal', $bulanSaatIni)
            ->sum('totalHarga');

        // Menghitung total profit
        $totalProfit = $totalPenjualan - $totalPembelian;

        // Mengambil total produk terjual untuk bulan saat ini
        $produkTerjual = DetailPenjualan::whereYear('created_at', $tahunSaatIni)
            ->whereMonth('created_at', $bulanSaatIni)
            ->sum('jumlah');

        // Mengirimkan data ke view
        return view('dashboard', [
            'loggedInUser' => $loggedInUser,
            'labels' => json_encode($labels),
            'data' => json_encode($data),
            'totalPenjualan' => $totalPenjualan,
            'totalPembelian' => $totalPembelian,
            'totalProfit' => $totalProfit,
            'produkTerjual' => $produkTerjual,
        ]);
    }
}
