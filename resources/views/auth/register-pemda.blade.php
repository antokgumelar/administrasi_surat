<!DOCTYPE html>
<html>
    <head>
        <tittle>Register Akun Admin</tittle>
    </head>
    <body>
        <form action="{{ route('register-pemda') }}" method="POST">
            @csrf
            <input type="text" name="nama_instansi" placeholder="masukkan nama instansi">
            <input type="text" name="alamat_instansi" placeholder="masukkan alamat instansi">
            <input type="number" name="telp_instansi" placeholder="masukkan no telp">
            <input type="text" name="username_instansi" placeholder="masukkan username">
            <input type="password" name="password_instansi" placeholder="Masukkan Password" required>
            <input type="password" name="password_instansi_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Register</button> 
        </form>
    </body>
</html>