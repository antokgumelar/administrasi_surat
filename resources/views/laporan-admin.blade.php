<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Cetak Laporan</title>
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

    .group-filter{
        /* display: flex; */
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 20px;
        font-size: 15px;

    }

    .form-control:focus {
        box-shadow: 0 0 8px rgba(128, 128, 128, 0.9) !important;
        border-color: rgb(128, 128, 128) !important;
    }

    .form-select:focus {
        box-shadow: 0 0 8px rgba(128, 128, 128, 0.9) !important;
        border-color: rgb(128, 128, 128) !important;
    }

    .btn:hover{
        background: linear-gradient(rgb(31, 0, 97, 0.9), rgb(31, 0, 97, 0.9)), url('image/background-2.jpg');
        background-color: rgb(31, 0, 97);
        background-size: 100px;
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

    table{
        width: 100%;
        font-size: 11px;
        table-layout: auto;
    }

    @media print{
        @page{
            size: landscape;
            margin: 1cm;
        }

        #laporan {
            width: 100%;
        }
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
                <a href="{{ route('laporan-admin') }}" class="navbar-brand active">
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
                <h2 style="font-weight: bold;">Cetak Laporan</h2>
                <form id="formFilter" class="group-filter w-50" method="GET" action="{{ route('laporan-admin') }}">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="waktu-mulai-filter" class="form-label">Tanggal Surat</label>
                            <div class="group-waktu d-flex">
                                <input type="date" class="form-control" id="mulai" name="mulai" value="{{ $mulai ?? '' }}">
                                <span class="mx-2">_</span>
                                <input type="date" class="form-control" id="akhir" name="akhir" value="{{ $akhir ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="opsi-1 d-flex gap-2">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="section" id="RadioDisposisi" value="dispo"
                                    {{ request('section') === 'dispo' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="RadioDisposisi">Disposisi</label>    
                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="section" id="RadioNonDisposisi" value="non"
                                    {{ request('section') === 'non' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="RadioNonDisposisi">Tanpa Disposisi</label>    
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary w-100" style="">Cari Surat</button>
                    </div>
                    <button class="btn btn-warning w-100" onclick="printSection('laporan')">Cetak Laporan</button>
                </form>
                <div id="laporan">
                    @if($section === 'dispo')
                        @if($data->count() > 0)
                        <table class="table table-hover">
                            <tr>
                                <th>Kode Disposisi</th>
                                <th>Kode Surat</th>
                                <th>Jenis Surat</th>
                                <th>Nomor Surat</th>
                                <th>Sifat Surat</th>
                                <th>Tujuan Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Lampiran Dokumen</th>
                                <th>Perihal Surat</th>
                                <th>Tanggal Disposisi</th>
                                <th>Tujuan Disposisi</th>
                                <th>Isi Disposisi</th>
                                <th>Status Disposisi</th>
                                <th>Terakhir Diubah</th>
                            </tr>
                            @foreach ($data as $laporDispo)
                            <tr>
                                <td>{{ $laporDispo->kode_dispo }}</td>
                                <td>{{ $laporDispo->kode_surat }}</td>
                                <td>{{ $laporDispo->jenis_surat }}</td>
                                <td>{{ $laporDispo->nomor_surat }}</td>
                                <td>{{ $laporDispo->sifat_surat }}</td>
                                <td>{{ $laporDispo->tujuan_surat }}</td>
                                <td>{{ $laporDispo->tanggal_surat }}</td>
                                <td>
                                    <a href="{{ asset('uploads/'. $laporDispo->upload_data) }}" target="_blank">Lihat Dokumen</a>
                                </td>
                                <td>{{ $laporDispo->perihal_surat }}</td>
                                <td>{{ $laporDispo->tanggal_dispo }}</td>
                                <td>{{ $laporDispo->tujuan_dispo }}</td>
                                <td>{{ $laporDispo->isi_dispo }}</td>
                                <td>{{ $laporDispo->status_dispo }}</td>
                                <td>{{ $laporDispo->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                                <span style="text-align: center; font-weight: bold;">Data tidak ditemukan</span>
                            @endif
                        </table>
                    @elseif($section === 'non')
                        @if ($data->count() > 0)
                            <table class="table table-hover">
                                <tr>
                                    <th>Kode Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Sifat Surat</th>
                                    <th>Tujuan Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Lampiran Dokumen</th>
                                    <th>Perihal Surat</th>
                                    <th>Status Surat</th>
                                    <th>Terakhir Diubah</th>
                                </tr>
                                @foreach($data as $laporSurat)
                                <tr>
                                    <td>{{ $laporSurat->kode_surat }}</td>
                                    <td>{{ $laporSurat->jenis_surat }}</td>
                                    <td>{{ $laporSurat->nomor_surat }}</td>
                                    <td>{{ $laporSurat->sifat_surat }}</td>
                                    <td>{{ $laporSurat->tujuan_surat }}</td>
                                    <td>{{ $laporSurat->tanggal_surat }}</td>
                                    <td>
                                        <a href="{{asset('uploads/'. $laporSurat->upload_data) }}" target="_blank">Lihat Dokumen</a>
                                    </td>
                                    <td>{{ $laporSurat->perihal_surat }}</td>
                                    <td>{{ $laporSurat->status_surat }}</td>
                                    <td>{{ $laporSurat->created_at }}</td>
                                </tr>
                                @endforeach
                            </table>
                            @else
                            <span style="text-align: center; font-weight: bold;">Data tidak ditemukan</span>
                            @endif
                    @endif
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
    <script>
        function printSection(sectionId){
            var printcontent = document.getElementById(sectionId).innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload()
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
  </body>
</html>