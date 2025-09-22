<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Disposisi Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        background: linear-gradient(rgb(31,0,97, 0.9), rgb(31,0,97, 0.9)), url('image/background-2.jpg');
        background-color: rgb(31,0,97);
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

    .form-control{
        font-size: 14px;
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
                <h5 style="border-bottom: 2px solid;">Pemerintah Daerah</h5>
                <a href="{{ route('home-pemda') }}" class="navbar-brand">
                    <i class="bi bi-house-fill"></i>Beranda
                </a>
                <a href="{{ route('surat-pemda') }}" class="navbar-brand active">
                    <i class="bi bi-file-earmark-plus-fill"></i>Surat
                </a>
                <a href="#" class="navbar-brand" onclick="event.preventDefault(); document.getElementById('logout-user').submit();">
                    <i class="bi bi-box-arrow-left"></i>Keluar
                </a>

                <form id="logout-user" action="{{ route('logoutUser') }}" method="POST" style="display:none;">
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
                <form action="{{ route('dispo.inputDisposisi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="fw-bold text-center">Input Disposisi Surat<h2>
                        <div class="group-form">
                            <input type="hidden" class="form-control" name="kode_dispo" id="kode_dispo">
                    <div class="mb-3 form">
                        <label for="kode_surat" class="form-label">Kode Surat</label>
                        <input type="text" class="form-control" id="kode_surat" name="kode_surat" value=" {{ $dispo->kode_surat }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="tanggal_input" class="form-label">Tanggal Masuk / Input</label>
                        <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" readonly value="{{ $dispo->tanggal_input }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="jenis_surat" class="form-label">Jenis Surat</label>
                        <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" placeholder="Masukkan Jenis Surat" value="{{ $dispo->jenis_surat }}" readonly>
                    </div>
                    <div class="mb-3 form">
                        <label for="pengirim_surat" class="form-label">Pengirim Surat</label>
                        <input type="text" class="form-control" id="pengirim_surat" name="pengirim_surat" placeholder="Masukkan Pengirim Surat" value="{{ $dispo->pengirim_surat }}"readonly>
                    </div>
                    <div class="mb-3 form">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan No. Surat" readonly value="{{ $dispo->nomor_surat }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="pengirim_surat_eks" class="form-label">Pengirim Surat Eksternal</label>
                        <input type="text" class="form-control" id="pengirim_surat_eks" name="pengirim_surat_eks" placeholder="Masukkan Pengirim Surat Eksternal" readonly 
                        value="{{ $dispo->pengirim_surat_eks }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" readonly value="{{ $dispo->tanggal_surat }}">
                    </div>
                    <div class="mb-3 form">
                    <label for="tujuan_dispo" class="form-label">Tujuan Disposisi</label>
                        <select class="form-select" id="tujuan_dispo" name="tujuan_dispo" required>
                            <option value="-" selected>-- Pilih Tujuan Disposisi --</option>
                            @foreach ($tujuanDispo as $tujuan)
                                <option value="{{ $tujuan }}">{{ $tujuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form">
                        <label for="sifat_surat" class="form-label">Sifat Surat</label>
                        <input type="text" class="form-control" id="sifat_surat" name="sifat_surat" placeholder="Masukkan Sifat Surat" readonly value="{{ $dispo->sifat_surat }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="tanggal_dispo" class="form-label">Tanggal Disposisi</label>
                        <input type="date" class="form-control" id="tanggal_dispo" name="tanggal_dispo"
                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="tujuan_surat" class="form-label">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan_surat" id="tujuan_surat" readonly value="{{ $dispo->tujuan_surat }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="upload_data" class="form-label">Upload Surat</label>
                        <p>
                            <a href="{{ asset('uploads/' . $dispo->upload_data) }}" target="_blank">
                                {{ $dispo->upload_data }}
                            </a>
                        </p>
                        <!-- <input type="file" class="form-control" name="upload_data" id="upload_data"> -->
                        <input type="hidden" name="upload_data_lama" value="{{ $dispo->upload_data }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="waktu_input" class="form-label">Waktu Input</label>
                        <input type="time" class="form-control" name="waktu_input" id="waktu_input" value="{{ $dispo->waktu_input }}" readonly>
                    </div>
                    <div class="mb-3 form">
                        <label for="waktu_dispo" class="form-label">Waktu Disposisi</label>
                        <input type="time" class="form-control" name="waktu_dispo" id="waktu_dispo"
                        value="{{ \Carbon\Carbon::now()->addHour(7)->format('H:i') }}">
                    </div>
                    <div class="mb-3 form">
                        <label for="perihal_surat" class="form-label">Perihal</label>
                        <textarea class="form-control" id="perihal_surat" name="perihal_surat" rows="4" placeholder="Masukkan Perihal Surat" 
                        readonly >{{ $dispo->perihal_surat }}</textarea>
                    </div>
                    <div class="mb-3 form">
                        <label for="isi_dispo" class="form-label">Isi Disposisi</label>
                        <textarea class="form-control" id="isi_dispo" name="isi_dispo" rows="4" placeholder="Masukkan Isi Disposisi" required></textarea>
                    </div>
                    <input type="hidden" name="status_dispo" value="Diproses">
                    <button type="submit" class="btn btn-secondary w-100">Disposisi Surat</button>
                    </div>
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
        function generateKodeDispo() {
            const number = Math.floor(Math.random() * 9000) + 100000;
            const kode = `${number}`;
            document.getElementById("kode_dispo").value = kode;
        }

        window.onload = generateKodeDispo();

        document.getElementById('lihatDoc').addEventListener('click', function(){
            window.open('{{ asset('/uploads/'. $dispo->upload_data) }}','_blank');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
  </body>
</html>