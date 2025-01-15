<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Master Data Ekstrakurikuler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                        <a class="nav-link" href="<?= base_url('admin/master_data_kelas'); ?>">Master Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/master_data_ekskul'); ?>">Master Data Ekstrakurikuler</a>
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
                <h2 class="mb-4">Master Data Ekstrakurikuler</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addEkskulModal">Tambah Ekstrakurikuler</button>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Id Ekskul</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Jumlah Siswa</th>
                            <TH>Guru Pembimbing</TH>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ekskul)): ?>
                            <?php foreach ($ekskul as $index => $item): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= esc($item['id_ekskul']); ?></td>
                                    <td><?= esc($item['nama_ekskul']); ?></td>
                                    <td><?= esc($item['jumlah_siswa']); ?></td>
                                    <td><?= esc($item['guru_pembimbing']); ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEkskulModal-<?= $item['id_ekskul']; ?>">Edit</button>
                                        <a href="<?= base_url('admin/delete-ekskul/' . $item['id_ekskul']); ?>" class="btn btn-danger btn-sm delete-button" >Hapus</a>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editEkskulModal-<?= $item['id_ekskul']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <form action="<?= base_url('admin/edit-ekskul/' . $item['id_ekskul']); ?>" method="post">
                                    <?= csrf_field() ?>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Ekstrakurikuler</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Id Ekskul</label>
                                                    <input type="text" class="form-control" name="id_ekskul" value="<?= esc($item['id_ekskul']); ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Ekstrakurikuler</label>
                                                    <input type="text" class="form-control" name="nama_ekskul" value="<?= esc($item['nama_ekskul']); ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Siswa</label>
                                                    <input type="number" class="form-control" name="jumlah_siswa" value="<?= esc($item['jumlah_siswa']); ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Guru Pembimbing</label>
                                                    <select class="form-select" name="id_guru" required>
                                                        <?php foreach ($gurus as $guru): ?>
                                                            <option value="<?= $guru['id_guru']; ?>" <?= isset($item['id_guru']) && $item['id_guru'] == $guru['id_guru'] ? 'selected' : ''; ?>>
                                                                <?= esc($guru['nama_guru']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data ekstrakurikuler.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
<div class="modal fade" id="addEkskulModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/add-ekskul'); ?>" method="post">
        <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Ekstrakurikuler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Id Ekskul</label>
                        <input type="text" class="form-control" name="id_ekskul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" name="nama_ekskul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Siswa</label>
                        <input type="number" class="form-control" name="jumlah_siswa" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Guru Pembimbing</label>
                    <select class="form-select" name="id_guru" required>
                        <?php foreach ($gurus as $guru): ?>
                            <option value="<?= $guru['id_guru']; ?>" <?= isset($item['id_guru']) && $item['id_guru'] == $guru['id_guru'] ? 'selected' : ''; ?>>
                                <?= esc($guru['nama_guru']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default action
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete action
                    window.location.href = url;
                }
            });
        });
    });
</script>

    <script>
    // Cek jika ada flash message dari server (gunakan PHP atau framework backend)
    <?php if (session()->getFlashdata('success')): ?>
        Swal.fire({
            title: 'Berhasil!',
            text: "<?= session()->getFlashdata('success'); ?>",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    <?php elseif (session()->getFlashdata('error')): ?>
        Swal.fire({
            title: 'Gagal!',
            text: "<?= session()->getFlashdata('error'); ?>",
            icon: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
