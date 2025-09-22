<?php

namespace App\Http\Controllers;
use App\Models\JenisSurat;
use App\Models\JenisDropdown;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function showJenis()
    {
        return view('opsional-admin');
    }

    public function inputJenis(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required'
        ]);

        $data = $request->all();
        JenisSurat::create($data);

        return redirect()->route('opsional-admin')->with('berhasil','Berhasil ditambahkan');
    }

    public function daftarOpsional()
    {
        $opsional = JenisSurat::pluck('jenis_surat');
        $hapusOpsi = JenisSurat::all();
        return view('opsional-admin', compact('opsional','hapusOpsi'));
    }

    public function hapusOpsi($id)
    {
        $hapusOpsi = JenisSurat::findOrFail($id);
        $hapusOpsi->delete();
        return redirect()->route('opsional-admin')->with(['success'=>'Berhasil Dihapus']);
    }

}
