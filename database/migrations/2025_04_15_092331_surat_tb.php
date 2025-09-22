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
        schema::create('surat_baru', function (Blueprint $table) {
            $table->string('kode_surat')->primary();
            $table->string('jenis_surat');
            $table->string('nomor_surat');
            $table->string('sifat_surat');
            $table->string('tujuan_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_input');
            $table->time('waktu_input');
            $table->string('pengirim_surat');
            $table->string('pengirim_surat_eks');
            $table->string('upload_data');
            $table->string('perihal_surat');
            $table->string('status_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_baru');
    }
};
