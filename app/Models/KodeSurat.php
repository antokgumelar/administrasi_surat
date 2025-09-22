<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    use HasFactory;
    protected $table = 'surat_baru';
    protected $fillable = [
        'kode_surat',
        'jenis_surat',
        'nomor_surat',
        'sifat_surat',
        'tujuan_surat',
        'tanggal_surat',
        'tanggal_input',
        'upload_data',
        'waktu_input',
        'pengirim_surat',
        'perihal_surat',
    ];
}
