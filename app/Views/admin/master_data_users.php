<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Master Data User</title>
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PRESISADMIN</a>
            <div class="ms-auto d-flex align-items-center">
                <span class="navbar-text text-light me-3">Admin</span>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/master_data_users'); ?>">Master Data Admin</a>
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
                <h2 class="mb-4">Master Data User</h2>

                <!-- Button untuk menambahkan user baru -->
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah User</button>
                <p>passwordnya pakek password_hash() pak </p>
                <!-- Tabel Data -->
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Id User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Guru</th>
                            <th>Role</th>
                            <th>Access Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?=$user['id_user'];?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= htmlspecialchars($user['password'] ?: 'Tidak Tersedia'); ?></td>
                                <td><?= $user['nama_guru'] ?: 'Tidak Ada'; ?></td> <!-- Menampilkan nama guru -->
                                <td><?= $user['role']; ?></td>
                                <td><?= $user['access_level']; ?></td>
                                <td><?= $user['status']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal-<?= $user['id_user']; ?>">Edit</button>
                                    <a href="<?= base_url('admin/delete-user/' . $user['id_user']); ?>" class="btn btn-danger btn-sm delete-button" >Hapus</a>
                                </td>
                                
                            </tr>
                            
                        
                            <!-- Modal Edit User -->
                            <div class="modal fade" id="editUserModal-<?= $user['id_user']; ?>" tabindex="-1" aria-hidden="true">
                            
                                <div class="modal-dialog">
                                    <form action="<?= base_url('admin/edit-user/' . $user['id_user']); ?>" method="post">
                                    <?= csrf_field() ?>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select name="role" class="form-select">
                                                        <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                                        <option value="Kesiswaan" <?= $user['role'] == 'Kesiswaan' ? 'selected' : ''; ?>>Kesiswaan</option>
                                                        <option value="Wakasek" <?= $user['role'] == 'Wakasek' ? 'selected' : ''; ?>>Wakasek</option>
                                                        <option value="Wali Kelas" <?= $user['role'] == 'Wali Kelas' ? 'selected' : ''; ?>>Wali Kelas</option>
                                                        <option value="Siswa" <?= $user['role'] == 'Siswa' ? 'selected' : ''; ?>>Siswa</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="access_level" class="form-label">Access Level</label>
                                                    <input type="number" class="form-control" name="access_level" value="<?= $user['access_level']; ?>" required>
                                                </div>
                                                <select name="id_guru" class="form-select" required>
                                                    <?php foreach ($guru as $g): ?>
                                                        <option value="<?= $g['id_guru']; ?>" <?= $g['id_guru'] == $user['id_guru'] ? 'selected' : ''; ?>>
                                                            <?= $g['nama_guru']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="status" class="form-select">
                                                        <option value="Aktif" <?= $user['status'] === 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                                                        <option value="Nonaktif" <?= $user['status'] === 'Nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                                                    </select>
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
            </div>
        </div>
    </div>

    <!-- Modal Tambah User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">
        <form action="<?= base_url('admin/add-user'); ?>" method="post">
        <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_user" class="form-label">Id User</label>
                        <input type="text" class="form-control" name="id_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="Admin">Admin</option>
                            <option value="Kesiswaan">Kesiswaan</option>
                            <option value="Wakasek">Wakasek</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="access_level" class="form-label">Access Level</label>
                        <input type="number" class="form-control" name="access_level" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_guru" class="form-label">Guru</label>
                        <select name="id_guru" class="form-select" required>
                            <?php foreach ($guru as $g): ?>
                                <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>