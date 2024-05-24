<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;
    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }

}
