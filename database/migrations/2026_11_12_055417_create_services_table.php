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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('no_resi')->unique();
            $table->string('nama_customer');
            $table->string('no_telpon')->nullable();
            $table->text('alamat')->nullable();
            $table->string('jenis_perangkat');
            $table->text('keluhan');
            $table->text('masalah_ditemukan')->nullable();
            $table->tinyInteger('tahap')->default(1)->comment('1: Pesanan Dibuat, 2: Pengecekan Perangkat, 3: Perbaikan Perangkat, 4: Perbaikan Selesai');
            $table->string('status_perbaikan')->default('Menunggu Konfirmasi');
            $table->string('pengantaran')->default('Diantar');
            $table->decimal('biaya_perbaikan', 12, 2)->default(0);
            $table->decimal('biaya_konsul', 12, 2)->default(50000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
