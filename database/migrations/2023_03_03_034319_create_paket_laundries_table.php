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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id');
            $table->enum('jenis', ['Kiloan','Dry Cleaning', 'Gorden','Jaket Kulit', 'Karpet', 'Sepatu', 'Koper-Tas', 'Boneka', 'Helm', 'SpringBed', 'Lainnya']);
            $table->string('nama_paket');
            $table->decimal('harga', 10, 2);
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
