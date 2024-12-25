<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PRESISADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex align-items-center">
                    <span class="navbar-text text-light me-3">Admin</span>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_users'); ?>">Master Data Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Master Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Master Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Master Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Master Data Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pelaporan Prestasi</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Dashboard Cards -->
            <div class="col-md-10">
                
                <div class="row mt-4">
                <h2>Dashboard</h2>
                <p>Selamat Datang di Dashboard Admin</p>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-bg-danger mb-3">
                            <div class="card-body text-center">
                                <h1 class="card-title fw-bold"><?= $totalSiswa; ?></h1>
                                <p class="card-text">Jumlah Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-bg-warning mb-3">
                            <div class="card-body text-center">
                                <h1 class="card-title fw-bold"><?= $totalPrestasi; ?></h1>
                                <p class="card-text">Jumlah Prestasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-bg-primary mb-3">
                            <div class="card-body text-center">
                                <h1 class="card-title fw-bold">--</h1>
                                <p class="card-text">Data Tambahan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Content Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Informasi Terbaru
                            </div>
                            <div class="card-body">
                                <p>Selamat datang di sistem administrasi prestasi siswa. Silakan pilih menu di sebelah kiri untuk mengelola data.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
