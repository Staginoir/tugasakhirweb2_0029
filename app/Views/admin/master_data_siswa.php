<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Master Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_users'); ?>">Master Data Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/master_data_siswa'); ?>">Master Data Siswa</a>
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
                        <a class="nav-link" href="<?= base_url('admin/pelaporan_prestasi'); ?>">Pelaporan Prestasi</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- Main Content -->
            <div class="col-md-10 mt-4">
                <h2>Master Data Siswa</h2>

                <!-- Button Tambah Data -->
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">Tambah Siswa</button>

                <!-- Tabel Data -->
                <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $student['nis_siswa']; ?></td>
                <td><?= $student['nama_siswa']; ?></td>                
                <td><?= $student['id_kelas']; ?></td>
                <td><?= $student['jenis_kelamin']; ?></td>
                <td><?= $student['alamat_siswa']; ?></td>
                <td><?= $student['kontak_siswa']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal-<?= $student['nis_siswa']; ?>">Edit</button>
                    <a href="<?= base_url('admin/delete-student/' . $student['nis_siswa']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</a>
                </td>
            </tr>
            <!-- Modal Edit Siswa -->
            <div class="modal fade" id="editStudentModal-<?= $student['nis_siswa']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="<?= base_url('admin/edit-student/' . $student['nis_siswa']); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_siswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_siswa" value="<?= $student['nama_siswa']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nis_siswa" class="form-label">NIS</label>
                                    <input type="text" class="form-control" name="nis_siswa" value="<?= $student['nis_siswa']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" name="id_kelas" value="<?= $student['id_kelas']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="Laki-laki" <?= $student['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $student['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_siswa" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat_siswa" rows="3" required><?= $student['alamat_siswa']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="kontak_siswa" class="form-label">Kontak</label>
                                    <input type="text" class="form-control" name="kontak_siswa" value="<?= $student['kontak_siswa']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passw_siswa" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="passw_siswa" value="<?= $student['passw_siswa']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/add-student'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nis_siswa" class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="id_kelas" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_siswa" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat_siswa" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kontak_siswa" class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak_siswa">
                    </div>
                    <div class="mb-3">
                        <label for="passw_siswa" class="form-label">Password</label>
                        <input type="password" class="form-control" name="passw_siswa" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
