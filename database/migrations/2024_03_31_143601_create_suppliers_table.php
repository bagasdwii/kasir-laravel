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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('namaToko');
            $table->string('namaSupplier');
            $table->string('noKontak');
            $table->string('alamat');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->unique(array('user_id','namaSupplier','noKontak','namaToko','alamat'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
