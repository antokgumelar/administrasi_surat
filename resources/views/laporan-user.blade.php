<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Selamat Datang</title>
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
        background: linear-gradient(rgb(31, 0, 97, 0.9), rgb(31, 0, 97, 0.9)), url('image/background-2.jpg');
        background-color: rgb(31, 0, 97);
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

    .group-filter{
        /* display: flex; */
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 20px;
        font-size: 15px;

    }

    .btn:hover{
        background: linear-gradient(rgb(31, 0, 97, 0.9), rgb(31, 0, 97, 0.9)), url('image/background-2.jpg');
        background-color: rgb(31, 0, 97);
        background-size: 150px;
        background-position: center;
        background-repeat: repeat;
        transition: 0.3s ease-in-out;
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
                <h5 style="border-bottom: 2px solid;">User</h5>
                <a href="{{ route('home-user') }}" class="navbar-brand">
                    <i class="bi bi-house-fill"></i>Beranda
                <a>
                <a href="{{ route('input-surat-user') }}" class="navbar-brand">
                    <i class="bi bi-file-earmark-plus-fill"></i>Input Suara Baru
                </a>
                <a href="{{ route('laporan-user') }}" class="navbar-brand active">
                    <i class="bi bi-file-earmark-excel-fill"></i>Cetak Laporan
                </a>
                <a href="#" class="navbar-brand">
                    <i class="bi bi-box-arrow-left"></i>Keluar
                </a>
            </div>
        </div>

        <div class="container">
            <div class="body">
            <h2 style="font-weight: bold;">Cetak Laporan</h2>
                <div class="group-filter">
                    <div class="mb-3">
                        <label for="waktu-mulai-filter" class="form-label">Tanggal Masuk Surat</label>
                        <div class="group-waktu d-flex">
                            <input type="date" class="form-control" id="waktu-mulai-filter">
                            <p>_</p>
                            <input type="date" class="form-control" id="waktu-mulai-filter">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-surat-filter" class="form-label">Jenis Surat</label>
                        <select class="form-select" aria-label="Default select example" placeholder="Pilih Jenis Surat">
                            <option selected>Pilih Jenis Surat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pengirim-surat-filter" class="form-label">Pengirim Surat</label>
                        <input type="text" class="form-control" id="pengirim-surat" placeholder="Masukkan Pengirim Surat">
                    </div>
                    <button class="btn btn-primary w-100" style="">Cari Surat</button>
                    <button class="btn btn-warning w-100">Cetak Surat</button>
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