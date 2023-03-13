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
            $table->unsignedBigInteger('paketlaundry_id')->nullable()->default(0);
            $table->unsignedBigInteger('user_id');
            $table->datetime('tgl_bayar');
            $table->decimal('berat', 8, 2);
            $table->decimal('biaya_tambahan', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->decimal('diskon', 5, 2)->default(0);
            $table->enum('status', ['proses','selesai','diambil']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('paketlaundry_id')->references('id')->on('paket_laundries');
            $table->foreign('user_id')->references('id')->on('users');
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
