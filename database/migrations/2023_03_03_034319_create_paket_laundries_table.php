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
        Schema::create('paket_laundries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id');
            $table->enum('jenis', ['Kiloan','DryCleaning', 'Gorden','JaketKulit', 'Karpet', 'Sepatu', 'Koper-Tas', 'Boneka', 'Helm', 'SpringBed', 'Lainnya']);
            $table->string('nama_paket');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_laundries');
    }
};
