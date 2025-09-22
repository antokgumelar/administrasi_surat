<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim</title>
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
        background: linear-gradient(rgba(255,255,255, 0.8), rgba(255, 255, 255, 0.8)), url('image/background-2.jpg');
        background-color:rgb(255, 255, 255);
        background-size: 200px;
        background-position: center;
        background-repeat: repeat;
        width: 100%;
        max-width: 100%;
        margin: auto;
    }

    html,body{
        max-width: 100%;
    }

    /* judul */

    .cari-Surat{
        display: flex; /* Menambahkan display flex */
        flex-direction: column;
        align-items: center; 
        padding-top: 100px;
        gap: 10px;
        height: 95vh;
    }

    /* lacak surat */
    .lacak-surat {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        gap: 10px;  
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
    }

    table{
        width: 100%;
        font-size : 13px;
        table-layout: auto;
        top: 100px;
    }

  </style>
  <body>
    <div class="content">
        <div class="container">
            <div class="cari-Surat">
                <form action="{{ route('cari-surat')}}" method="GET" class="lacak-surat">
                    <input type="text" class="form-control w-50" id="kataKunci" name="kataKunci" style="text-align: center;"
                    placeholder="Masukkan Kode Surat / No Surat / Pengirim / Perihal" value="{{ $keyword ?? '' }}">
                    <button type="submit" class="btn btn-primary">Lacak Surat</button>
                </form>
                @if(request()->has('kataKunci'))
            @if ($hasil-> count())
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
                    <th>Pengirim Surat</th>
                    <th>Tujuan Disposisi</th>
                    <th>Isi Disposisi</th>
                    <th>Status Disposisi</th>
                    <th>Terakhir Diubah</th>
                </tr>
                @foreach ($hasil as $cekSurat)
                <tr>
                    <td>{{ $cekSurat->kode_dispo }}</td>
                    <td>{{ $cekSurat->kode_surat }}</td>
                    <td>{{ $cekSurat->jenis_surat }}</td>
                    <td>{{ $cekSurat->nomor_surat }}</td>
                    <td>{{ $cekSurat->sifat_surat }}</td>
                    <td>{{ $cekSurat->tujuan_surat }}</td>
                    <td>{{ $cekSurat->tanggal_surat }}</td>
                    <td>
                        <a href="{{ asset('uploads/'. $cekSurat->upload_data) }}" target="_blank">Lihat Dokumen</a>
                    </td>
                    <td>{{ $cekSurat->perihal_surat }}</td>
                    <td>{{ $cekSurat->pengirim_surat }}</td>
                    <td>{{ $cekSurat->tujuan_dispo }}</td>
                    <td>{{ $cekSurat->isi_dispo }}</td>
                    <td>{{ $cekSurat->status_dispo }}</td>
                    <td>{{ $cekSurat->created_at }}</td>
                </tr>
                @endforeach
            </table>
            @else
                <p style="font-weight: bold;">Surat Belum Didisposisi / Surat Tidak Ditemukan</p>
            @endif
            @endif

            </div>            
        </div>

        <!-- footer -->
        <footer>
            <div class="kredit">
                <a style="color: black;">© 2025 PROKOMPIM</a>
                <a>Support By Dinas Komunikasi, Informatika, Statistika dan Persandian</a>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
  </body>
</html>