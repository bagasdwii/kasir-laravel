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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('categori_id');
            $table->string('namaBarang');
            $table->string('kodeBarang');
            $table->integer('hargaBeli');
            $table->integer('hargaJual');
            $table->string('stok');
            $table->timestamps();
            // $table->unique(array('user_id','namaBarang','kodeBarang'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
