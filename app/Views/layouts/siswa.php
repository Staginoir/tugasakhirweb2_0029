<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> <!-- SweetAlert2 CSS -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>
<body>
    <!-- SweetAlert Flash Messages -->
    <?php if (session()->has('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<?= htmlspecialchars(session('error')) ?>',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '<?= htmlspecialchars(session('success')) ?>',
                confirmButtonText: 'OK',
                timer: 3000, // Otomatis hilang setelah 3 detik
                timerProgressBar: true
            });
        </script>
    <?php endif; ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">PRESWA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Panduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Prestasi</a></li>
                    <a href="<?= base_url('siswa/dashboard'); ?>"><?= session('nama_siswa') ?? 'Siswa'; ?></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Header -->
    <div class="content-header">
        <div class="container">
            <p>BERANDA - PRESTASI</p>
            <h2>Data Prestasi</h2>
        </div>
    </div>

    <!-- Content Section -->
    <?= $this->renderSection('content'); ?>
</body>
</html>
