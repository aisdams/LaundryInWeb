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
            $table->foreignID('outlet_id');
            $table->foreignID('customer_id');
            $table->foreignID('paketlaundry_id');
            $table->foreignID('user_id');
            $table->string('kode_invoice')->nullable();
            $table->datetime('tgl');
            $table->datetime('tgl_bayar');
            $table->integer('berat')->nullable();
            $table->integer('biaya_tambahan')->nullable();
            $table->integer('total')->nullable();
            $table->string('diskon')->nullable();
            $table->enum('status', ['proses','selesai','diambil']);
            $table->enum('dibayar', ['dibayar','belum bayar']);
            $table->text('keterangan')->nullable();
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
