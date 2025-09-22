<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kode extends Model
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
        'waktu_input',
        'pengirim_surat',
        'perihal_surat',
    ];
}
