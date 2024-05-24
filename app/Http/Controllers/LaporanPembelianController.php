<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanPembelianController extends Controller
{
    public function laporanpembelian()
    {
        $loggedInUser = Auth::user();


        return view('laporanpembelian', compact( 'loggedInUser'));
    }

    public function filterpembelian(Request $request)
    {
        $dateRange = $request->input('dateRange');
        $dates = explode(' - ', $dateRange);
        $title = 'Pembelian';
        $tanggalawal = \Carbon\Carbon::createFromFormat('Y-m-d', $dates[0]);
        $tanggalakhir = \Carbon\Carbon::createFromFormat('Y-m-d', $dates[1]);
        // Atur tanggal akhir untuk mencakup seluruh hari pada tanggal tersebut
        $endDate = date('Y-m-d', strtotime($dates[1] . ' +1 day'));

        // Query data dari database berdasarkan rentang tanggal yang dipilih
        $reports = DetailPembelian::whereBetween('created_at', [$dates[0], $endDate])->get();
    
        $pdf = PDF::loadview('laporan_pdf', ['reports' => $reports, 'title' => $title,'tanggalawal' => $tanggalawal, 'tanggalakhir' => $tanggalakhir]);
        $fileName = 'Laporan-Data-Pembelian-' . $tanggalawal->format('d-m-Y') . '-' . $tanggalakhir->format('d-m-Y') . '.pdf';
        return $pdf->download($fileName);
        // return view('laporan_pdf', compact( 'reports', 'title'));

    }
}
