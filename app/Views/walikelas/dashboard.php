<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
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
        .card a {
            text-decoration: none; /* Menghilangkan underline pada link */
            color: inherit; /* Memastikan warna teks mengikuti elemen induk */
        }

        .card a:hover {
            text-decoration: none; /* Menghilangkan underline saat hover */
        }

        .navbar {
            margin-bottom: 20px;
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
                    <span class="navbar-text text-light me-3">Wali Kelas</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('walikelas/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('walikelas/persetujuan_prestasi'); ?>">Persetujuan Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('walikelas/semua_prestasi'); ?>">Semua Prestasi</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Content Section -->
            <div class="col-md-10">
                <h2>Dashboard Wali Kelas</h2>
                <p>Selamat Datang di Dashboard Wali Kelas</p>

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

                <!-- Dashboard Cards -->
<div class="row mt-4">
    <!-- Card Persetujuan Belum -->
    <div class="col-md-6 col-lg-4">
        <div class="card text-bg-danger mb-3">
            <a href="<?= base_url('walikelas/persetujuan_prestasi'); ?>">
                <div class="card-body text-center">
                    <h1 class="card-title fw-bold"><?= $jumlahBelumDisetujui; ?></h1>
                    <p class="card-text">Persetujuan Belum</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Card Jumlah Prestasi -->
    <div class="col-md-6 col-lg-4">
        <div class="card text-bg-warning mb-3">
            <a href="<?= base_url('walikelas/semua_prestasi'); ?>">
                <div class="card-body text-center">
                    <h1 class="card-title fw-bold"><?= $jumlahTotalPrestasi; ?></h1>
                    <p class="card-text">Jumlah Prestasi</p>
                </div>
            </a>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
    <script>
    // Fungsi untuk mengonfirmasi logout menggunakan SweetAlert
    document.querySelector('.nav-link[href="/logout"]').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah pengalihan halaman langsung
        
        // Menampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari akun ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna memilih untuk logout, arahkan ke halaman logout
                window.location.href = '/logout';
            }
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
