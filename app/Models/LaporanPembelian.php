<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPembelian extends Model
{
    use HasFactory;
    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
