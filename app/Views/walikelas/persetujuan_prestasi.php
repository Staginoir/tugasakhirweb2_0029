<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
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
        .table-container {
            margin-top: 20px;
        }
        .action-buttons button {
            margin-right: 5px;
        }
        .navbar {
            margin-bottom: 20px;
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
                        <a class="nav-link " href="<?= base_url('walikelas/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('walikelas/persetujuan_prestasi'); ?>">Persetujuan Prestasi</a>
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

            <!-- Persetujuan Prestasi Content -->
            <div class="col-md-10">
                <h2 class="mt-4">Persetujuan Prestasi</h2>
                <p>Daftar prestasi yang menunggu persetujuan.</p>

                <div class="table-container">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Prestasi</th>
                                <th>Jenis Prestasi</th>
                                <th>Ekstrakurikuler</th>
                                <th>Nama Kegiatan</th>
                                <th>Tingkat</th>
                                <th>Gelar</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Persetujuan Wali Kelas</th>
                                <th>Persetujuan Wakasek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($prestasi)) : ?>
                            <?php foreach ($prestasi as $index => $prestasiItem) : ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= $prestasiItem['nama_siswa']; ?></td>
                                    <td><?= $prestasiItem['nama_kelas']; ?></td>
                                    <td><?= $prestasiItem['jenis_prestasi']; ?></td>
                                    <td><?= $prestasiItem['ekstrakurikuler']; ?></td>
                                    <td><?= $prestasiItem['nama_kegiatan']; ?></td>
                                    <td><?= $prestasiItem['tingkat']; ?></td>
                                    <td><?= $prestasiItem['gelar']; ?></td>
                                    <td><?= $prestasiItem['waktu_pelaksanaan']; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        $walkelas = $prestasiItem['persetujuan_walkelas'] ?? 'Menunggu';
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
                                        $wakasek = $prestasiItem['persetujuan_wakasek'] ?? 'Menunggu';
                                        if ($wakasek === 'Diterima') {
                                            echo '<span class="status-diterima">Diterima</span>';
                                        } elseif ($wakasek === 'Ditolak') {
                                            echo '<span class="status-ditolak">Ditolak</span>';
                                        } else {
                                            echo '<span class="status-menunggu">Menunggu</span>';
                                        }
                                    ?>
                                </td>
                                <td class="action-buttons">
                                <?= csrf_field() ?>
                                    <form action="/wakasek/approve/<?= $prestasiItem['id_prestasi']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <button type="submit" class="btn btn-success btn-sm btn-setujui">Setujui</button>
                                    </form>
                                    <form action="/wakasek/reject/<?= $prestasiItem['id_prestasi']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm btn-tolak">Tolak</button>
                                    </form>
                                </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data prestasi yang menunggu persetujuan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
<script>
    // Fungsi untuk mengonfirmasi aksi Setujui menggunakan SweetAlert
    document.querySelectorAll('.btn-setujui').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah form submit langsung
            
            const form = this.closest('form'); // Ambil form terkait

            // Menampilkan SweetAlert konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui prestasi ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna memilih untuk setujui, kirim form
                    form.submit();
                }
            });
        });
    });

    // Fungsi untuk mengonfirmasi aksi Tolak menggunakan SweetAlert
    document.querySelectorAll('.btn-tolak').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah form submit langsung
            
            const form = this.closest('form'); // Ambil form terkait

            // Menampilkan SweetAlert konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menolak prestasi ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna memilih untuk tolak, kirim form
                    form.submit();
                }
            });
        });
    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
