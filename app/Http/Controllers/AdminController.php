<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\JenisDropdown;
use App\Models\PengirimDropdown;
use App\Models\Dispo;
use App\Models\KodeSurat;
use App\Models\Surat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home_admin()
    {
        return view('home-admin');
    }

    public function disposisi_admin()
    {
        return view('disposisi-admin');
    }

    public function dispoForm($kode_surat)
    {
        $dispo = KodeSurat::where('kode_surat', $kode_surat)->firstOrFail();
        $namaTujuan = PengirimDropdown::where('role','!=','pemda')->pluck('nama_instansi');
        $namaPemda = PengirimDropdown::where('role','=','pemda')->pluck('nama_instansi');

        return view('disposisi-admin', compact('dispo','namaTujuan','namaPemda'));
    }

    public function getSurat($kode_surat)
    {
        $surat = KodeSurat::where('kode_surat', $kode_surat)->first();
    
        if ($surat) {
            return response()->json([
                'tanggal_input' => $surat->tanggal_input,
                'jenis_surat' => $surat->jenis_surat,
                'nomor_surat' => $surat->nomor_surat,
                'tujuan_dispo' => $surat->tujuan_dispo,
                'sifat_surat' => $surat->sifat_surat,
                'tanggal_dispo' => $surat->tanggal_dispo,
                'tanggal_surat' => $surat->tanggal_surat,
                'waktu_dispo' => $surat->waktu_dispo,
                'waktu_input' => $surat->waktu_input,
                'perihal_surat' => $surat->perihal_surat,
                'isi_dispo' => $surat->isi_dispo,
            ]);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    
    public function input_surat_admin()
    {
        return view('input-surat-admin');
    }

    public function inputSuratAdmin(Request $request)
    {
        $request->validate([
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nomor_surat' => 'required',
            'sifat_surat' => 'required',
            'tujuan_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_input' => 'required|date',
            'waktu_input' => 'required',
            'pengirim_surat' => 'required',
            'pengirim_surat_eks' => 'required',
            'upload_data' => 'required|mimes:pdf|max:2048',
            'perihal_surat' => 'required',
            'status_surat' => 'nullable|string',
        ]);

        if ($request->hasFile('upload_data')) {
            $file = $request->file('upload_data');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        } else {
            $filename = null;
        }
        
        Surat::create([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nomor_surat' => $request->nomor_surat,
            'sifat_surat' => $request->sifat_surat,
            'tujuan_surat' => $request->tujuan_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_input' => $request->tanggal_input,
            'waktu_input' => $request->waktu_input,
            'pengirim_surat' => $request->pengirim_surat,
            'pengirim_surat_eks' => $request->pengirim_surat_eks,
            'upload_data' => $filename,
            'perihal_surat' => $request->perihal_surat,
            'status_surat' => "Disampaikan",
        ]);

        return redirect()->route('surat-baru-admin')->with('success','Telah berhasil Melakukan Input');
        return redirect()->back()->with('error','Gagal Melakukan Input Surat');
    }

    public function daftarDropdown()
    {
        $jenisSurat = JenisDropdown::pluck('jenis_surat');
        $namaPengirim = PengirimDropdown::where('role','!=','pemda')->pluck('nama_instansi');

        return view('input-surat-admin', compact('jenisSurat','namaPengirim'));
    }

    public function surat_baru_admin()
    {
        return view('surat-baru-admin');
    }

    public function daftarSurat()
    {
        $suratbaru = Surat::select('kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat',
        'tanggal_input','waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat','status_surat','created_at')->
        orderBy('created_at','desc')->get();
        return view('surat-baru-admin', compact('suratbaru'));
    }

    public function inputDispo(Request $request)
    {
        $request->validate([
            'kode_dispo' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nomor_surat' => 'required',
            'sifat_surat' => 'required',
            'tujuan_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_input' => 'required|date',
            'waktu_input' => 'required',
            'pengirim_surat' => 'required',
            'pengirim_surat_eks' => 'required',
            'upload_data' => 'string',
            'perihal_surat' => 'required',
            'tujuan_dispo' => 'required',
            'tanggal_dispo' => 'required|date',
            'waktu_dispo' => 'required',
            'isi_dispo' => 'required',
            'status_dispo' => 'nullable|string',
        ]);

        if ($request->hasFile('upload_data')) {
            $file = $request->file('upload_data');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        } else {
                $filename = $request->input('upload_data_lama');
        }
        Dispo::create([
            'kode_dispo' => $request->kode_dispo,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nomor_surat' => $request->nomor_surat,
            'sifat_surat' => $request->sifat_surat,
            'tujuan_surat' => $request->tujuan_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_input' => $request->tanggal_input,
            'waktu_input' => $request->waktu_input,
            'pengirim_surat' => $request->pengirim_surat,
            'pengirim_surat_eks' => $request->pengirim_surat_eks,
            'upload_data' => $filename,
            'perihal_surat' => $request->perihal_surat,
            'tujuan_dispo' => $request->tujuan_dispo,
            'tanggal_dispo' => $request->tanggal_dispo,
            'waktu_dispo' => $request->waktu_dispo,
            'isi_dispo' => $request->isi_dispo,
            'status_dispo' => "Diproses",
        ]);

        $surat = Surat::where('kode_surat', $request->kode_surat)->first();
        if($surat) {
            $surat->status_surat = 'Telah didisposisi';
            $surat->save();
        }

        return redirect()->route('disposisi-admin-baru')->with('success','Telah Berhasil Melakukan Disposisi');
        return redirect()->back()->with('Gagal Melakukan Disposisi');
    }

    public function daftarDispo()
    {
        $dispobaru = Dispo::select('kode_dispo','kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat',
        'tanggal_surat','tanggal_input','waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat',
        'tujuan_dispo','tanggal_dispo','waktu_dispo','isi_dispo','status_dispo','created_at')->
        orderBy('waktu_dispo','desc')->get();
        return view('disposisi-admin-baru', compact('dispobaru'));
    }

    
    public function laporan_admin()
    {
        return view('laporan-admin');
    }

    public function daftarJenis()
    {
        $jenisSurat = JenisDropdown::pluck('jenis_surat');
        return view('laporan-admin', compact('jenisSurat'));
    }

    public function lapor(Request $request){

        $namaAktif = session('nama_instansi');
        $section = $request->input('section');
        $mulai = $request->input('mulai');
        $akhir = $request->input('akhir');

        $data = collect();
       
        if ($section === 'dispo') {
            $data = Dispo::select('kode_dispo','kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat',
            'upload_data','perihal_surat','tanggal_dispo','tujuan_dispo','isi_dispo','status_dispo','created_at')
        ->orderBy('created_at','desc')
        ->when($mulai && !$akhir, function($query) use ($mulai){
            return $query->whereDate('tanggal_surat', '>=', $mulai);
        })
        ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
            return $query->whereBetween('tanggal_surat', [$mulai, $akhir]);
        })
        ->get();

        } elseif ($section === 'non') {
            $data = Surat::select('kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat','upload_data',
            'perihal_surat','status_surat','created_at')
        ->orderBy('created_at','desc')
        ->when($mulai && !$akhir, function ($query) use ($mulai){
            return $query->whereDate('tanggal_surat', '>=', $mulai);
        })
        ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
            return $query->whereBetween('tanggal_surat', [$mulai, $akhir]);
        })
        ->get(); 
        
        } 
        return view('laporan-admin', compact('data','section', 'mulai','akhir'));
    }

    public function filterTanggal(Request $request)
    {
        $mulai = $request->input('mulai');
        $akhir = $request->input('akhir');
        $section = $request->input('section');

        if ($section === 'dispo') {
            $q = Dispo::query();
        } elseif ($section === 'non') {
            $q = Surat::query();
        } else {
            $data = collect();
            return view('laporan-admin', compact('data','section', 'mulai', 'akhir'));
        }

        if ($mulai && $akhir) {
            $q->whereBetween('tanggal_surat', [$mulai, $akhir]);
        }

        $data = $q->get();

        return view('laporan-admin', compact('data','section', 'mulai', 'akhir'));
    }

    
    public function opsional_admin()
    {
        return view('opsional-admin');
    }
    
    public function pengambilan_admin()
    {
        return view('pengambilan-admin');
    }
    
    public function perangkat_daerah()
    {
        return view('auth.perangkat-daerah');
    }

    public function showjenisSurat()
    {
        return view('opsional');
    }

}
