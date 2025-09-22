<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    
    protected $table = 'surat_baru';
    protected $primaryKey = 'kode_surat';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat','tanggal_input','waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat','status_surat'];
}
