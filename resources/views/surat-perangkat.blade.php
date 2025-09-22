<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prokompim - Surat</title>
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
        min-height: 700px;
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
        overflow-x: auto;
        overflow-y: auto;
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

    table{
        width: 100%;
        font-size: 15px;
        table-layout:auto;
    }

    th:nth-child(1),
    td:nth-child(1){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(2),
    td:nth-child(2){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(3),
    td:nth-child(3){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(4),
    td:nth-child(4){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(5),
    td:nth-child(5){
        min-width: 150px;
        max-width: 190px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(6),
    td:nth-child(6){
        min-width: 150px;
        max-width: 180px;
    }

    th:nth-child(7),
    td:nth-child(7){
        min-width: 150px;
        max-width: 180px;
    }

    th:nth-child(8),
    td:nth-child(8){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(9),
    td:nth-child(9){
        min-width: 150px;
        max-width: 180px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(10),
    td:nth-child(10){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(11),
    td:nth-child(11){
        min-width: 220px;
        max-width: 250px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(12),
    td:nth-child(12){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(13),
    td:nth-child(13){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(14),
    td:nth-child(14){
        min-width: 200px;
        max-width: 250px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(15),
    td:nth-child(15){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(16),
    td:nth-child(16){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(17),
    td:nth-child(17){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    th:nth-child(18),
    td:nth-child(18){
        min-width: 180px;
        max-width: 230px;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .hoverable:hover{
        background-color:rgb(255, 81, 0);
    }

    .notif{
        display: flex;
        align-items: center;
    }

    .rounded-circle{
    left: 120px;
    }

  </style>
  <body>
    <div class="content">
    <div class="navigasi-bar">
            <div class="container group-list-list">
                <h2 style="font-weight: bold;">PROKOMPIM</h2>
                <h5 style="border-bottom: 2px solid;">Instansi Daerah</h5>
                <a href="{{ route('home-perangkat') }}" class="navbar-brand">
                    <i class="bi bi-house-fill"></i>Beranda
                <a>
                <a href="{{ route('surat-perangkat') }}" class="navbar-brand active">
                    <i class="bi bi-file-earmark-plus-fill"></i>Surat
                </a>
                <a href="{{ route('laporan-perangkat') }}" class="navbar-brand">
                    <i class="bi  bi-file-earmark-excel-fill"></i>Laporan
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
                <h1 style="font-weight: bold;">Surat Disposisi</h1>
                <div class="body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="container d-flex">

                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Kode Disposisi</th>
                            <th>Kode Surat</th>
                            <th>Jenis Surat</th>
                            <th>Nomor Surat</th>
                            <th>Sifat Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Input</th>
                            <th>Waktu Input</th>
                            <th>Pengirim Surat</th>
                            <th>Pengirim Surat Eksternal</th>
                            <th>Lampiran Dokumen</th>
                            <th>Perihal Surat</th>
                            <th>Tujuan Disposisi</th>
                            <th>Waktu Disposisi</th>
                            <th>Isi Disposisi</th>
                            <th>Status</th>
                            <th>Terakhir Diubah</th>
                        </tr>
                        @foreach ($suratbaru as $suratbaru)
                        <tr>
                            <td>{{ $suratbaru->kode_dispo}}</td>
                            <td>{{ $suratbaru->kode_surat }}</td>
                            <td>{{ $suratbaru->jenis_surat }}</td>
                            <td>{{ $suratbaru->nomor_surat }}</td>
                            <td>{{ $suratbaru->sifat_surat }}</td>
                            <td>{{ $suratbaru->tujuan_surat }}</td>
                            <td>{{ $suratbaru->tanggal_surat }}</td>
                            <td>{{ $suratbaru->tanggal_input }}</td>
                            <td>{{ $suratbaru->waktu_input }}</td>
                            <td>{{ $suratbaru->pengirim_surat }}</td>
                            <td>{{ $suratbaru->pengirim_surat_eks }}</td>
                            <td>
                                <a href="{{ route('dispo.show', $suratbaru->kode_dispo) }}" id="liveToastBtn" target="_blank">Lihat Dokumen</a>
                            </td>
                            <td>{{ $suratbaru->perihal_surat }}</td>
                            <td>{{ $suratbaru->tujuan_dispo }}</td>
                            <td>{{ $suratbaru->waktu_dispo }}</td>
                            <td>{{ $suratbaru->isi_dispo}}</td>
                            <td>{{ $suratbaru->status_dispo }}</td>
                            <td>{{ $suratbaru->updated_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="toast-container position-fixed bottom-0 end-0 p-5">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="30000">
                            <div class="toast-header bg-warning">
                                <strong class="me-auto">Admin</strong>
                                <small>Sekarang</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Status Telah Diperbarui
                            </div>
                        </div>
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
            document.querySelectorAll('.btn-dispo').forEach(button => {
                button.addEventListener('click', function () {
                    const kodeSurat = this.dataset.kode_surat;
                    window.location.href = `/disposisi-pemda/${kodeSurat}`;
                });
            });

            document.addEventListener('DOMContentLoaded', function(){
                const toastTrigger = document.getElementById('liveToastBtn')
                const toastLiveExample = document.getElementById('liveToast')
                let hasShownToast = false;

                if (toastTrigger) {
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastTrigger.addEventListener('click', () => {
                    if (!hasShownToast){
                        toastBootstrap.show()
                        hasShownToast = true;
                    }
                })
                }  
            });

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
  </body>
</html>