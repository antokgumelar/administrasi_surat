<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Instansi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterAdminForm()
    {
        return view('auth.register-admin');
    }

    public function register_admin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login-admin')->with('Berhasil', 'Akun berhasil dibuat!');
    }

    public function showLoginForm()
    {
        return view('auth.login-admin');
    }

    public function login_admin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin); // Login manual ke Laravel Auth
            return redirect()->intended('home-admin')->with('berhasil', 'Selamat Datang!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user dari sistem

        $request->session()->invalidate(); // Hapus semua session
        $request->session()->regenerateToken(); // Regenerasi CSRF token agar lebih aman

        return redirect()->route('login-admin')->with('berhasil', 'Anda telah logout.');
    }

    // -----------------------------------------------------------

    public function showLoginInstansi()
    {
        return view('auth.login-user');
    }

    public function login_user(Request $request)
    {
        $request->validate([
            'username_instansi' => 'required|string',
            'password_instansi' => 'required|string',
            'role' => 'string|in:pemda,perangkat_daerah',
        ]);

        $instansi = Instansi::where('username_instansi', $request->username_instansi)->first();

        if ($instansi && Hash::check($request->password_instansi, $instansi->password_instansi)) 
        {
            Auth::guard('instansi')->login($instansi);

            $instansi = Auth::guard('instansi')->user();
            session(['nama_instansi' => $instansi->nama_instansi]);
            $namaAktif = session('nama_instansi');
                if ($instansi->role === 'pemda'){
                    return redirect()->route('home-pemda')->with('success', 'Selamat datang');
                } elseif ($instansi-> role === 'perangkat_daerah'){
                    return redirect()->route('home-perangkat')->with('success', 'Selamat datang');
                } else {
                    return redirect()->route('welcome')->with('error', 'Tidak Dikenali');
                }
        }

        return back()->withErrors([
            'username_instansi' => 'username atau password salah'
        ]);
    }

    public function logoutUser(Request $request)
    {
        Auth::guard('instansi')->logout(); // Logout user dari sistem

        $request->session()->invalidate(); // Hapus semua session
        $request->session()->regenerateToken(); // Regenerasi CSRF token agar lebih aman

        return redirect()->route('login-user')->with('berhasil', 'Anda telah logout.');
    }

    // ------------------------------------------------------------------
    public function showRegisterPemda()
    {
        return view('auth.register-pemda');
    }

    public function register_pemda (Request $request)
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
            'role' => "pemda",
        ]);

        return redirect()->route('welcome')->with('berhasil','Akun telah ditambahkan');
    }
}
