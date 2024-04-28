<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pembelian_id');
            $table->foreignId('barang_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subTotal');
            $table->timestamps();
            $table->unique(array('user_id','barang_id', 'pembelian_id'));
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelians');
    }
};
