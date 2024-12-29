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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->integer('kode_barang');
            $table->string('artist');
            $table->string('jenis');
            $table->string('nama_parfum');
            $table->string('satuan');
            $table->integer('stock_awal');
            $table->string('promosi');
            $table->integer('harga');
            $table->integer('stok_laku');
            $table->integer('sisa_stok');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
