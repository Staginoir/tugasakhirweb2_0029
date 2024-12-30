<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #0056b3;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .content-header {
            background: linear-gradient(to bottom, #007bff, #66b2ff);
            color: white;
            padding: 15px 20px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-warning {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">PRESWA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Agil Naufal Ramadhan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Header -->
    <div class="content-header">
        <div class="container">
            <h2>Data Prestasi</h2>
        </div>
    </div>

    <!-- Content -->
    <div class="container my-4">
        <button class="btn btn-primary mb-3">Tambah Data Baru</button>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jenis Prestasi</th>
                    <th>Ekstrakurikuler</th>
                    <th>Nama Kegiatan</th>
                    <th>Tingkat</th>
                    <th>Gelar</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Persetujuan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Akademik</td>
                    <td>Di Luar Ekstrakurikuler</td>
                    <td>OSN Fisika 2021</td>
                    <td>SMAN 4 Cibinong</td>
                    <td>Juara II</td>
                    <td>2022-07-07</td>
                    <td><span class="badge badge-success">Diterima</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">🔍</button>
                        <button class="btn btn-success btn-sm">✏️</button>
                        <button class="btn btn-danger btn-sm">🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Non Akademik</td>
                    <td>Taekwondo</td>
                    <td>Kejuaraan Taekwondo</td>
                    <td>SMAN 4 Cibinong</td>
                    <td>Medali Perak</td>
                    <td>2022-01-11</td>
                    <td><span class="badge badge-success">Diterima</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">🔍</button>
                        <button class="btn btn-success btn-sm">✏️</button>
                        <button class="btn btn-danger btn-sm">🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Akademik</td>
                    <td>Di Luar Ekstrakurikuler</td>
                    <td>Olimpiade Sains Indonesia</td>
                    <td>Daerah/Provinsi</td>
                    <td>Medali Perunggu</td>
                    <td>2021-04-14</td>
                    <td><span class="badge badge-warning">Menunggu</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">🔍</button>
                        <button class="btn btn-success btn-sm">✏️</button>
                        <button class="btn btn-danger btn-sm">🗑️</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <nav>
            <ul class="pagination justify-content-end">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
