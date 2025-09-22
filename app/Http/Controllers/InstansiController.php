<?php

namespace App\Http\Controllers;
use App\Models\Instansi;
use App\Models\Dispo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstansiController extends Controller
{
    public function index()
    {
        return view('home-perangkat');
    }
    public function showInstansi()
    {
        return view('perangkat-daerah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|max:100',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required|max:13',
            'username_instansi' => 'required',
            'password_instansi' => 'required|confirmed',
            'role' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['password_instansi'] = Hash::make($request->password_instansi);

        Instansi::create([
            'nama_instansi' => $data['nama_instansi'],
            'alamat_instansi' => $data['alamat_instansi'],
            'telp_instansi' => $data['telp_instansi'],
            'username_instansi' =>$data['username_instansi'],
            'password_instansi' =>$data['password_instansi'],
            'role' => "perangkat_daerah",
        ]);

        return redirect()->route('perangkat-daerah')->with('berhasil','Akun telah ditambahkan');
    }

    public function daftarPerangkat()
    {
        $perangkat = Instansi::select('id','nama_instansi','alamat_instansi','telp_instansi','username_instansi','created_at','updated_at')->get();

        return view ('perangkat-daerah', compact('perangkat'));
    }

    public function hapusPerangkat($id)
    {
        $perangkat = Instansi::findOrFail($id);
        $perangkat->delete();
        return redirect()->route('perangkat-daerah')->with(['success'=>'Akun Perangkat Daerah Berhasil Dihapus']);
    }

    public function pilihPerangkat($id)
    {
        $perangkat = Instansi::where('id', $id)->get();
        return view ('perangkat-daerah-edit', compact('perangkat'));
    }

    public function updatePerangkat(Request $request,$id)
    {
        $request->validate([
            'nama_instansi' => 'required|max:100',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required|max:13',
            'username_instansi' => 'required',
            'password_instansi' => 'required|confirmed'
        ]);

        $perangkat = Instansi::findOrFail($id);
        $data = [
            'nama_instansi' => $request->nama_instansi,
            'alamat_instansi' => $request->alamat_instansi,
            'telp_instansi' => $request->telp_instansi,
            'username_instansi' => $request->username_instansi,
            'password_instansi' => Hash::make($request->password_instansi),
        ];

        if ($request->filled('password_instansi')) {
            $perangkat['password_instansi'] = Hash::make($request->password_instansi);
        }

        $perangkat->update($data);

        return redirect()->route('perangkat-daerah')->with('success','Berhasil Memperbarui Akun Perangkat Daerah');
        return redirect()->back()->with('error','Gagal Memperbarui Akun Perangkat Daerah');
    }

    public function showsuratDispo()
    {
        return view('surat-perangkat');
    }

    public function showdaftarDispo()
    {
        $namaAktif = session('nama_instansi');
        $suratbaru = Dispo::select('kode_dispo','kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat',
        'tanggal_input','waktu_input','pengirim_surat','pengirim_surat_eks','upload_data','perihal_surat','tujuan_dispo','waktu_dispo',
        'isi_dispo','status_dispo','updated_at')->
        where('tujuan_dispo', $namaAktif)->get();
        return view('surat-perangkat', compact('suratbaru'));
    }

    public function showDispo($kode_dispo)
    {
        $suratbaru = Dispo::findOrFail($kode_dispo);

        $suratbaru->status_dispo = "Selesai";
        $suratbaru->save();

        return redirect(asset('uploads/' . $suratbaru->upload_data));
    }

    public function laporan_perangkat()
    {
        return view('laporan-perangkat');
    }

    public function lapor(Request $request){

        $namaAktif = session('nama_instansi');
        $mulai = $request->input('mulai');
        $akhir = $request->input('akhir');

        $data = Dispo::select('kode_dispo','kode_surat','jenis_surat','nomor_surat','sifat_surat','tujuan_surat','tanggal_surat',
        'upload_data','perihal_surat','tanggal_dispo','tujuan_dispo','isi_dispo','status_dispo','created_at')
        ->where('tujuan_dispo',$namaAktif)
        ->when($mulai && !$akhir, function($query) use ($mulai){
            return $query->whereDate('tanggal_surat', '>=', $mulai);
        })
        ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
            return $query->whereBetween('tanggal_surat', [$mulai, $akhir]);
        })
        ->orderBy('created_at','desc')
        ->get();

        return view('laporan-perangkat', compact('data', 'mulai','akhir'));
    }

    public function filterTanggal(Request $request)
    {
        $mulai = $request->input('mulai');
        $akhir = $request->input('akhir');
        
        $data = Dispo::query()
            ->when($mulai && !$akhir, function ($query) use ($mulai){
                return $query->whereDate('tanggal_surat', '>=', $mulai);
            })
            ->when($mulai && $akhir, function ($query) use ($mulai, $akhir){
                return $query->whereBetween('tanggal_surat',[$mulai, $akhir]);
            })
            ->get();
        return view('laporan-perangkat', compact('data', 'mulai', 'akhir'));
    }
    
}
