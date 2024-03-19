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
        Schema::create('peminjaman_ulasanbuku', function (Blueprint $table) {
            $table->id('UlasanID');
            $table->string('UserID');
            $table->string('BukuID');
            $table->text('Ulasan');
            $table->string('Rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_ulasanbuku');
    }
};
