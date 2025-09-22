<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispo extends Model
{
    use HasFactory;
    protected $table = 'dispo_surat';
    protected $primaryKey = 'kode_dispo';
    protected $fillable = ['kode_dispo','kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat','tanggal_input','waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat','tujuan_dispo','tanggal_dispo','waktu_dispo','isi_dispo','status_dispo'];
}
