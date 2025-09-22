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
        schema::create('dispo_surat', function (Blueprint $table) {
            $table->string('kode_dispo')->primary();
            $table->string('kode_surat');
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
            $table->date('tanggal_dispo');
            $table->date('waktu_dispo');
            $table->string('isi_dispo');
            $table->string('status_dispo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispo_surat');
    }
};
