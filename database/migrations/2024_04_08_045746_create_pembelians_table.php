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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('supplier_id');
            $table->string('noFaktur');
            $table->date('tanggal');
            $table->integer('totalHarga');
            $table->timestamps();
            $table->unique(array('user_id','supplier_id','noFaktur'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
