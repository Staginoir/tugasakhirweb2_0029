<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            
            background-color: #0056b3;
            
        }
        .navbar-collapse {
            margin-right: 80px;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand{
            font-size: 28px;
            font-weight: bold;
            margin-right: auto;
            margin-left: 50px;
            color: white; /* Mengubah warna teks menjadi putih */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Menambahkan efek bayangan */
            font-family: 'Poppins', sans-serif; /* Pastikan font family sudah diterapkan */
            text-decoration: none; 
        }
        .navbar-nav .nav-item {
            margin-right: 10px; /* Tambahkan margin antar item */
        }
        .nav-link {
            padding: 10px 15px; /* Sesuaikan padding untuk jarak */
            font-size: 16px;
            font-weight: 500;
        }

        .container {
            margin-top: 20px;
        }
        .container-b{
            margin: 80px;
        }
        .content-header {
            
            background: linear-gradient(to bottom, #007bff, #66b2ff);
            color: white;
            padding: 15px 20px;
            text-align: center;
            
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
        .status-diterima {
            background-color: #28a745;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-ditolak {
            background-color: #dc3545;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-menunggu {
            background-color: #ffc107;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }

    </style>
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
     <header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('siswa/dashboard'); ?>">ℙℝ𝔼𝕊𝕎𝔸</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/data_prestasi'); ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/tentang_kami'); ?>"">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/panduan'); ?>">Panduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/faq'); ?>">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('siswa/data_prestasi'); ?>">Prestasi</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?= base_url('siswa/dashboard'); ?>"><?= session('nama_siswa') ?? 'Siswa'; ?></a></li>
                   
                </ul>
            </div>
        </div>
    </nav>
    


    <!-- Content Section -->
    <?= $this->renderSection('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
