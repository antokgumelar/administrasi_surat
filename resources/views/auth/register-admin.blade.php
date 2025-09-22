<!DOCTYPE html>
<html>
    <head>
        <tittle>Register Akun Admin</tittle>
    </head>
    <body>
        <form action="{{ route('register-admin') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Register</button> 
        </form>
    </body>
</html>