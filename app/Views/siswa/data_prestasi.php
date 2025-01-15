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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/dashboard'); ?>"><?= $nama_siswa; ?></a></li>
                   
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-b">
            <p>BERANDA - PRESTASI</p>
            <h2 style="font-weight: bold;">Data Prestasi</h2>
        </div>
    </div>

    <!-- Content -->
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
        <a href="<?= base_url('siswa/input_prestasi'); ?>" class="btn btn-primary mb-3">Tambah Data Baru</a>
            <!-- Tambahkan Input Pencarian Berdasarkan Nama Kegiatan -->
            <input type="text" id="search" class="form-control w-25" placeholder="Cari berdasarkan Nama Kegiatan...">
        </div>

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
                    <th>Persetujuan Wali Kelas</th>
                    <th>Persetujuan Wakasek</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody id="prestasi-data">
                <?php if (!empty($prestasi)) : ?>
                    <?php foreach ($prestasi as $index => $item) : ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $item['jenis_prestasi'] ?? '-'; ?></td>
                            <td><?= $item['ekstrakurikuler'] ?? '-'; ?></td>
                            <td><?= $item['nama_kegiatan'] ?? '-'; ?></td>
                            <td><?= $item['tingkat'] ?? '-'; ?></td>
                            <td><?= $item['gelar'] ?? '-'; ?></td>
                            <td><?= $item['waktu_pelaksanaan'] ?? '-'; ?></td>
                            <td class="text-center">
                    <?php 
                        $walkelas = $item['persetujuan_walkelas'] ?? 'Menunggu';
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
                        $wakasek = $item['persetujuan_wakasek'] ?? 'Menunggu';
                        if ($wakasek === 'Diterima') {
                            echo '<span class="status-diterima">Diterima</span>';
                        } elseif ($wakasek === 'Ditolak') {
                            echo '<span class="status-ditolak">Ditolak</span>';
                        } else {
                            echo '<span class="status-menunggu">Menunggu</span>';
                        }
                    ?>
                </td>
                            <td>
                                <a href="<?= base_url('siswa/edit/' . $item['id_prestasi']); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('siswa/delete/' . $item['id_prestasi']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="<?= base_url('siswa/show/' . $item['id_prestasi']); ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10">Tidak ada data prestasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<script>
    
    // Fungsi Pencarian Berdasarkan Nama Kegiatan
    document.getElementById('search').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#prestasi-data tr');
        rows.forEach(row => {
            const namaKegiatan = row.children[3].textContent.toLowerCase(); // Kolom ke-3: Nama Kegiatan
            row.style.display = namaKegiatan.includes(searchValue) ? '' : 'none';
        });
    });
</script>

</body>
</html>
