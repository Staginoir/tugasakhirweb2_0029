<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Master Data Kelas</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PRESISADMIN</a>
            <div class="ms-auto">
                <span class="navbar-text text-light">Admin</span>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
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
                        <a class="nav-link active" href="<?= base_url('admin/master_data_kelas'); ?>">Master Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/master_data_ekskul'); ?>">Master Data Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/pelaporan_prestasi'); ?>">Pelaporan Prestasi</a>
                    </li>
                    <li><hr></li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 mt-4">
                <h2 class="mb-4">Master Data Kelas</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKelasModal">Tambah Kelas</button>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Kelas</th>
                            <th>Level</th>
                            <th>Nama Kelas</th>
                            <th>ID Guru</th>
                            <th>Kapasitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classes as $index => $class): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $class['id_kelas']; ?></td>
                            <td><?= $class['level_kelas']; ?></td>
                            <td><?= $class['nama_kelas']; ?></td>
                            <td><?= $class['id_guru']; ?></td>
                            <td><?= $class['kapasitas']; ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKelasModal-<?= $class['id_kelas']; ?>">Edit</button>
                                <a href="<?= base_url('admin/delete-kelas/' . $class['id_kelas']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editKelasModal-<?= $class['id_kelas']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url('admin/edit-kelas/' . $class['id_kelas']); ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Kelas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <input type="text" class="form-control" name="level_kelas" value="<?= $class['level_kelas']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kelas</label>
                                                <input type="text" class="form-control" name="nama_kelas" value="<?= $class['nama_kelas']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">ID Guru</label>
                                                <input type="text" class="form-control" name="id_guru" value="<?= $class['id_guru']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kapasitas</label>
                                                <input type="text" class="form-control" name="kapasitas" value="<?= $class['kapasitas']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addKelasModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/add-kelas'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID Kelas</label>
                            <input type="text" class="form-control" name="id_kelas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <input type="text" class="form-control" name="level_kelas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Guru</label>
                            <input type="text" class="form-control" name="id_guru" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kapasitas</label>
                            <input type="text" class="form-control" name="kapasitas" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
