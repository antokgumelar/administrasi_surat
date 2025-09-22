<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Opsional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <!-- icon set-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>

  <style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content{
        background-color:rgb(255, 255, 255);
        width: 100%;
        max-width: 100%;
        margin: auto;
        display: flex;
    }

    html,body{
        max-width: 100%;
    }

    /* navigasi */
    .navigasi-bar{
        background: linear-gradient(rgb(128, 128, 128, 0.9), rgb(128, 128, 128, 0.9)), url('image/background-2.jpg');
        background-color: rgb(128, 128, 128);
        background-size: 200px;
        background-position: center;
        background-repeat: repeat;
        width: 250px;
        height: 700px;
    }

    .group-list-list{
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        color: white;
        text-decoration: none;
        font-size: 20px;
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: normal;
        padding: 20px;
        margin: auto;
    }

    .navbar-brand{
        display: flex;
        gap: 10px;
    }

    .navbar-brand.active{
        color: yellow;
    }

    .navbar-brand:hover{
        color: yellow;
    }

    /* body */
    .body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: auto;
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: normal;
    }

    .form-group-tambah-jenis-surat{
        width: 100%;
        max-width: 700px;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;    
        font-size: 15px;
    }

    .form-group-hapus-jenis-surat{
        width: 100%;
        max-width: 700px;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;  
        font-size: 15px;  
    }
    
    .form-control:focus {
        box-shadow: 0 0 8px rgba(128, 128, 128, 0.9) !important;
        border-color: rgb(128, 128, 128) !important;
    }

    .btn:hover{
        background: linear-gradient(rgb(31, 0, 97, 0.9), rgb(31, 0, 97, 0.9)), url('image/background-2.jpg');
        background-color: rgb(31, 0, 97);
        background-size: 150px;
        background-position: center;
        background-repeat: repeat;
        transition: 0.3s ease-in-out;
        font-weight: bold;
        color: yellow;
    }


    /* footer */
    footer{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: white;
        padding: 4px;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        height: 10px;
    }

  </style>
  <body>
    <div class="content">
        <div class="navigasi-bar">
            <div class="container group-list-list">
            <h2 style="font-weight: bold;">PROKOMPIM</h2>
                <h5 style="border-bottom: 2px solid;">Admin</h5>
                <a href="{{ route('home-admin') }}" class="navbar-brand">
                    <i class="bi bi-house-fill"></i>Beranda
                <a>
                <a href="{{ route('perangkat-daerah') }}" class="navbar-brand">
                    <i class="bi bi-buildings-fill"></i>Instansi Daerah
                </a>
                <a href="{{ route('input-surat-admin') }}" class="navbar-brand">
                    <i class="bi bi-file-earmark-plus-fill"></i>Input Surat Baru
                </a>
                <a href="{{ route('surat-baru-admin') }}"class="navbar-brand">
                    <i class="bi bi-file-earmark-text-fill"></i>Surat Baru
                </a>
                <a href="{{ route('disposisi-admin-baru') }}" class="navbar-brand">
                    <i class="bi bi-collection-fill"></i>Disposisi Surat
                </a>
                <a href="{{ route('laporan-admin') }}" class="navbar-brand">
                    <i class="bi  bi-file-earmark-excel-fill"></i>Laporan
                </a>
                <a href="{{ route('opsional-admin') }}" class="navbar-brand active">
                    <i class="bi bi-opencollective"></i>Opsional
                </a>
                <a href="#" class="navbar-brand" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <div class="container mt-4">
            <div class="body">
                <h1 style="font-weight: bold;">Opsional</h1>
                <form class="form-group-tambah-jenis-surat" action="{{ route('JenisSurat.inputJenis') }}" method="POST">
                    @csrf
                    <h5 style="border-bottom: 1px solid;">Jenis Surat</h5>
                    <div class="mb-3">
                        <label for="exampleFormControl1" class="form-label">Tambahkan Jenis Surat</label>
                        <input type="text" class="form-control" id="Tambah Jenis SUrat" name="jenis_surat" 
                        placeholder="Masukkan Jenis Surat Baru" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-secondary">Konfirmasi</button>
                </form>
                <div class="form-group-hapus-jenis-surat">
                    <div class="mb-3">
                        <label for="exampleFormControl1" class="form-label">Hapus Jenis Surat</label>
                        <select class="form-select" aria-label="Default select example" placeholder="Pilih Jenis Surat">
                            <option selected>Pilih Jenis Surat</option>
                            @foreach($opsional as $opsional)
                                <option value="{{ $opsional }}">{{ $opsional }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($hapusOpsi as $opsi)
                    <form action="{{ route('JenisSurat.hapusOpsi', $opsi->id) }}" method="POST" onsubmit="return confirm('Yakin Ingin Dihapus?')">
                    @endforeach
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>       
        <!-- footer -->
        <footer>
            <div class="kredit">
                <a style="color: black;">© 2025 PROKOMPIM</a>
                <a>Support By Dinas Komunikasi, Informatika, Statistika dan Persandian</a>
            </div>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
  </body>
</html>