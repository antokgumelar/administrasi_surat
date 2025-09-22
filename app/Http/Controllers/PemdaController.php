<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Dispo;
use App\Models\TujuanDropdown;
use Illuminate\Http\Request;

class PemdaController extends Controller
{
    public function index(){
        return view('home-pemda');
    }

    public function showSuratTabel(){
        return view('surat-pemda');
    }

    public function daftarSurat()
    {
        $namaAktif = session('nama_instansi');
        $suratbaru = Surat::select('kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat','tanggal_input',
        'waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat','status_surat','created_at')->
        where('tujuan_surat', $namaAktif)->where('status_surat','!=','Telah didisposisi')->orderBy('created_at','desc')->get();
        return view('surat-pemda', compact('suratbaru'));
    }

    public function lihatDokumen($kode_surat)
    {
        $suratbaru = Surat::findOrFail($kode_surat);

        if($suratbaru->status_surat === "Disampaikan"){
            $suratbaru->status_surat = "Dibaca";
            $suratbaru->save();    
        }
        return redirect(asset('uploads/' . $suratbaru->upload_data));
    }

    public function pilihDispo($kode_surat)
    {
        $dispo = Surat::where('kode_surat', $kode_surat)->firstOrFail();
        $tujuanDispo = TujuanDropdown::where('role','!=','pemda')->pluck('nama_instansi');

        return view('disposisi-pemda', compact('dispo','tujuanDispo'));
    }

    public function inputDisposisi(Request $request)
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

        return redirect()->route('surat-pemda')->with('success','Telah Berhasil Melakukan Disposisi');
        return redirect()->route('home-pemda')->with('Gagal Melakukan Disposisi');
    }

    public function laporan_pemda()
    {
        return view('laporan-pemda');
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
        ->where('tujuan_surat',$namaAktif)
        ->when($mulai && !$akhir, function($query) use ($mulai){
            return $query->whereDate('tanggal_surat', '>=', $mulai);
        })
        ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
            return $query->whereBetween('tanggal_surat', [$mulai, $akhir]);
        })
        ->get(); 

        } elseif ($section === 'non') {
            $data = Surat::select('kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat',
            'upload_data','perihal_surat','status_surat','created_at')
        ->orderBy('created_at','desc')
        ->where('tujuan_surat',$namaAktif)
        ->when($mulai && !$akhir, function ($query) use ($mulai){
            return $query->whereDate('tanggal_surat', '>=', $mulai);
        })
        ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
            return $query->whereBetween('tanggal_surat', [$mulai, $akhir]);
        })
        ->get(); 
        
        } 
        return view('laporan-pemda', compact('data','section', 'mulai','akhir'));
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
            return view('laporan-pemda', compact('data','section', 'mulai', 'akhir'));
        }

        if ($mulai && $akhir) {
            $q->whereBetween('tanggal_surat', [$mulai, $akhir]);
        }

        $data = $q->get();

        return view('laporan-pemda', compact('data','section', 'mulai', 'akhir'));
    }
}
