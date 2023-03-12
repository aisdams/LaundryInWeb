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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('paketlaundry_id');
            $table->unsignedBigInteger('user_id');
            $table->string('kode_invoice')->nullable();
            $table->datetime('tgl');
            $table->datetime('tgl_bayar');
            $table->decimal('berat', 8, 2);
            $table->decimal('biaya_tambahan', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->decimal('diskon', 5, 2)->default(0);
            $table->enum('status', ['proses','selesai','diambil']);
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
