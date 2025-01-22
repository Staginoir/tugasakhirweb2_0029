<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

            /* Gaya khusus untuk cetak */
    @media print {
        body * {
            visibility: hidden;
            font-size: 12px;
        }
        th, td {
        font-size: 12px;
        padding: 5px; /* Menambah ruang di dalam sel */
    }

    
        .print-section, .print-section * {
            visibility: visible;
        }
        .print-section {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        /* Margin cetak dan orientasi landscape */
        @page {
            size: A4 landscape; /* Mengatur halaman menjadi landscape */
            margin: 15mm; /* Margin kertas */
        }
        .print-section {
            margin: 0;
        }
        /* Tabel fleksibel */
        table {
            width: 100%;
            table-layout: fixed; /* Mengatur tabel agar kolom memiliki lebar tetap */
            border-collapse: collapse;
        }
        th, td {
            word-wrap: break-word; /* Memastikan teks tidak melampaui kolom */
            white-space: normal; /* Membiarkan teks membungkus */
        }
        /* Lebar spesifik untuk kolom tertentu */
        th:nth-child(1), td:nth-child(1) { /* Kolom No */
            width: 5%;
        }
        th:nth-child(2), td:nth-child(2) { /* Nama Siswa */
            width: 15%;
        }
        th:nth-child(10), td:nth-child(10), 
        th:nth-child(11), td:nth-child(11) { /* Persetujuan */
            width: 10%; /* Lebar cukup untuk kolom persetujuan */
        }
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
                        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_users'); ?>">Master Data Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_siswa'); ?>">Master Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_guru'); ?>">Master Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_kelas'); ?>">Master Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_ekskul'); ?>">Master Data Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/pelaporan_prestasi'); ?>">Pelaporan Prestasi</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-10 mt-4">
                <div class="print-section">
                    <h2 class="text-center">Laporan Data Prestasi</h2>
                    <h5 class="text-center">SMAN 4 CIBINONG</h5>

                    
                    
                    <!-- Tabel Data Prestasi -->
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped">
                        <thead class="table-light">
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jenis Prestasi</th>
        <th>Ekstrakurikuler</th>
        <th>Nama Kegiatan</th>
        <th>Tingkat</th>
        <th>Gelar</th>
        <th>Waktu Pelaksanaan</th>
        <th>Persetujuan Wali Kelas</th>
        <th>Persetujuan Wakasek</th>
    </tr>
</thead>
<tbody>
    <?php if (!empty($prestasiList)): ?>
        <?php foreach ($prestasiList as $index => $prestasi): ?>
            <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td><?= $prestasi['nama_siswa']; ?></td>
                <td><?= $prestasi['nama_kelas']; ?></td>
                <td><?= $prestasi['jenis_prestasi']; ?></td>
                <td><?= $prestasi['ekstrakurikuler']; ?></td>
                <td><?= $prestasi['nama_kegiatan']; ?></td>
                <td><?= $prestasi['tingkat']; ?></td>
                <td><?= $prestasi['gelar']; ?></td>
                <td><?= $prestasi['waktu_pelaksanaan']; ?></td>
                <td class="text-center">
                    <?php 
                        $walkelas = $prestasi['persetujuan_walkelas'] ?? 'Menunggu';
                        if ($walkelas === 'Diterima') {
                            echo '<span class="status-diterima">Diterima</span>';
                        } elseif ($walkelas === 'Ditolak') {
                            echo '<span class="status-ditolak">Ditolak</span>';
                        } else {
                            echo '<span class="status-menunggu">Menunggu</span>';
                        }
                    ?>
                </td>
                <td class="text-center">
                    <?php 
                        $wakasek = $prestasi['persetujuan_wakasek'] ?? 'Menunggu';
                        if ($wakasek === 'Diterima') {
                            echo '<span class="status-diterima">Diterima</span>';
                        } elseif ($wakasek === 'Ditolak') {
                            echo '<span class="status-ditolak">Ditolak</span>';
                        } else {
                            echo '<span class="status-menunggu">Menunggu</span>';
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="11" class="text-center">Tidak ada data prestasi tersedia.</td>
        </tr>
    <?php endif; ?>
</tbody>

                        </table>
                    </div>
                </div>

                <!-- Tombol Cetak -->
                <button class="btn btn-primary mt-3" onclick="window.print()">Cetak Laporan</button>
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
