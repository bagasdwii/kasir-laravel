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
        Schema::create('detail_returs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('retur_id')->constrained()->onDelete('cascade');
            $table->foreignId('barang_id');

            $table->date('tanggal');
            $table->integer('kembali');

            $table->timestamps();
            $table->unique(array('user_id','id'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_returs');
    }
};
