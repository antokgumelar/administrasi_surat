<?php

namespace App\Http\Controllers;

use App\Models\JenisDropdown;
use App\Models\PengirimDropdown;
use App\Models\Dispo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('cari-surat');
    }

    public function cariSurat(Request $request)
    {
        $keyword = $request->get('kataKunci');

        $hasil = collect();

        if($keyword){
            $hasil = Dispo::where('kode_surat', $keyword)
            ->orWhere('nomor_surat', $keyword)
            ->orWhere('pengirim_surat',$keyword)
            ->orWhere('perihal_surat', $keyword)
            ->orderBy('created_at','desc')
            ->get();    
        }
        return view('cari-surat', compact('keyword', 'hasil'));
    }

    public function cekSuratDispo() {
        $cekSurat = Dispo::select('kode_dispo', 'kode_surat', 'jenis_surat', 'nomor_surat', 'sifat_surat', 'tujuan_surat', 'upload_data', 'pengirim_surat','perihal_surat', 'isi_dispo', 'status_dispo', 'created_at')
        ->orderBy('created_at','desc')->get();
        return view('cari-surat', compact('cekSurat'));
    }
}
