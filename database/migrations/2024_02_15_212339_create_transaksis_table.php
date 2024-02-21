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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('namaPaket');
            $table->integer('harga');
            $table->string('nama');
            $table->string('plat')->nullable();
            $table->string('noTlp');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('produk_id')->constrained();
            $table->foreignId('voucher_id')->nullable()->constrained()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
