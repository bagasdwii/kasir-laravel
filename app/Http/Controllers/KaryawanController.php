<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    // public function karyawan(){
    //     $loggedInOwner = Auth::user()->email; // Mengambil owner dari user yang sedang login
    //     $data = User::where('owner', $loggedInOwner)->orderBy('created_at', 'desc')->get(); // Mengambil semua data user dengan owner yang sesuai
    //     $loggedInUser = Auth::user(); // Mengambil data user yang sedang login
       
    //     return view('karyawan', compact('data', 'loggedInUser')); // Mengirim data ke view
    // }
    public function karyawan(){
        $loggedInOwner = Auth::user()->email; // Mengambil owner dari user yang sedang login
         // Mengambil semua data user dengan owner yang sesuai dan urutkan berdasarkan tanggal dibuat
        $query = User::orderBy('created_at', 'desc');
        
        // Cek jika email pengguna adalah email khusus yang diizinkan
        if ($loggedInOwner === 'razor10.rz@gmail.com') {
            $data = $query->get(); // Mengambil semua data karyawan
        }else {
            $data = User::
            where('role', 'staff')
            ->orderBy('created_at', 'desc')
            ->get();
        }
            // Mengambil semua data user dengan owner yang sesuai dan urutkan berdasarkan tanggal dibuat
            
       
        $loggedInUser = Auth::user(); // Mengambil data user yang sedang login
        
        return view('karyawan', compact('data', 'loggedInUser')); // Mengirim data ke view
    }
    public function tambah(){
        $loggedInUser = Auth::user();
        return view('/tambahkaryawan')->with('loggedInUser', $loggedInUser);
     
    }
    public function tambahdata(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users', 'max:255']
            // tambahkan aturan validasi lainnya di sini
        ]);
        if ($validator->fails()) {
    
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Data dengan nama dan kode barang yang sama sudah ada.');

        }
        // Buat entri data jika validasi berhasil
        User::create($request->all());
    
        // Redirect ke halaman karyawan dengan pesan berhasil
        return redirect()->route('karyawan')->with('success', 'Data berhasil ditambahkan.');
    }
    
    public function tampilkaryawan($id){
        $data = User::find($id);
        $loggedInUser = Auth::user();

        // dd($data);
        return view('/tampilkaryawan', compact('data', 'loggedInUser'));
       
    }
    public function updatekaryawan(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('karyawan');

    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('karyawan');

    }
}
