<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Input Surat</title>
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
        height: auto;
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

    .group-form{
        width: 100%;
        max-width: 1200px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        padding: 30px;
        padding-right: 10px;
        /* align-items: center; */
    }

    .form{
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 800px;
        font-size: 15px;
        flex: 1 1 calc(50% - 10px);
    }

    .form-label{
        white-space: nowrap;
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
                <a href="{{ route('input-surat-admin') }}" class="navbar-brand active">
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
                <a href="{{ route('opsional-admin') }}" class="navbar-brand">
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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            <h2 class="fw-bold text-center">Formulir Input Surat Baru<h2>
                <form class="group-form" action="{{ route('surat.inputSuratAdmin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form">
                        <label for="kode_surat" class="form-label">Kode Surat</label>
                        <input type="text" class="form-control" id="kode_surat" name="kode_surat" placeholder="Masukkan Kode Surat" autocomplete="off">
                    </div>
                    <div class="mb-3 form">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
                    </div>
                    <div class="mb-3 form">
                        <label for="jenis_surat" class="form-label">Jenis Surat</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_surat" name="jenis_surat" placeholder="Pilih Jenis Surat">
                            <option selected>-- Pilih Jenis Surat --</option>
                            @foreach($jenisSurat as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form">
                        <label for="tanggal_input" class="form-label">Tanggal Masuk / Input</label>
                        <input type="date" class="form-control" id="tanggal_input" name="tanggal_input">
                    </div>
                    <div class="mb-3 form">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan No. Surat" autocomplete="off">
                    </div>
                    <div class="mb-3 form">
                        <label for="waktu_input" class="form-label">Waktu Input</label>
                        <input type="time" class="form-control" id="waktu_input" name="waktu_input">
                    </div>
                    <div class="mb-3 form">
                        <label for="sifat_surat" class="form-label">Sifat Surat</label>
                        <input type="text" class="form-control" id="sifat_surat" name="sifat_surat" placeholder="Masukkan Sifat Surat" autocomplete="off">
                    </div>
                    <div class="mb-3 form">
                        <label for="pengirim_surat" class="form-label">Pengirim Surat</label>
                        <select class="form-select" id="pengirim_surat" name= "pengirim_surat" placeholder="Pilih Pengirim Surat">
                            <option selected>-- Pilih Pengirim Surat --</option>
                            <option value="-">Lainnya</option>
                            @foreach($namaPengirim as $pengirim)
                                <option value="{{ $pengirim }}">{{ $pengirim}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form">
                        <label for="tujuan_surat" class="form-label">Tujuan</label>
                        <select class="form-select" id="tujuan_surat "name="tujuan_surat" placeholder="Pilih Pengirim Surat">
                            <option selected>-- Pilih Tujuan Surat --</option>
                            <option value="Walikota">Walikota</option>
                            <option value="Wakil Walikota">Wakil Walikota</option>
                            <option value="Sekretaris Daerah">Sekretaris Daerah</option>
                        </select>
                    </div>
                    <div class="mb-3 form">
                        <label for="pengirim_surat_eks" class="form-label">Pengirim Surat Eksternal</label>
                        <input type="text" class="form-control" id="pengirim_surat_eks" name="pengirim_surat_eks" placeholder="Masukkan Nama Pengirim Surat Eksternal" autocomplete="off">
                    </div>
                    <div class="mb-3 form">
                        <label for="upload_data" class="form-label">Upload Surat</label>
                        <input type="file" class="form-control" id="upload_data" name="upload_data" accept="application/pdf">
                    </div>
                    <div class="mb-3 form">
                        <label for="perihal_surat" class="form-label">Perihal</label>
                        <textarea class="form-control" id="perihal_surat" name="perihal_surat" placeholder="Masukkan Perihal Surat" rows="3" autocomplete="off"></textarea>
                    </div>

                    <input type="hidden" name="status_surat" value="Disampaikan">
                    <button type="submit" class="btn btn-secondary w-100">Kirim Surat</button>
                </form>
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
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.getElementById('pengirim_surat');
        const inputEks = document.getElementById('pengirim_surat_eks');

        // Sembunyikan input eksternal di awal
        inputEks.closest('.form').style.display = 'none';

        dropdown.addEventListener('change', function () {
            if (this.value === '-') {
                inputEks.closest('.form').style.display = 'block';
            } else {
                inputEks.closest('.form').style.display = 'none';
                inputEks.value = '-'; // Kosongkan jika tidak dipilih
            }
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
  </body>
</html>