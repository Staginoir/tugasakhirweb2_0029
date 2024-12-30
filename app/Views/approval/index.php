<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Kelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light border" style="width: 250px; min-height: 100vh;">
            <div class="p-3">
                <h4>PreswAdmin</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/approval">Persetujuan Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container mt-4">
            <h2 class="mb-4">Persetujuan Prestasi</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas Siswa</th>
                        <th>Jenis Prestasi</th>
                        <th>Ekstrakurikuler</th>
                        <th>Nama Kegiatan</th>
                        <th>Tingkat</th>
                        <th>Gelar</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Persetujuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($prestasi)) : ?>
                        <?php $no = 1; foreach ($prestasi as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_siswa']; ?></td>
                                <td><?= $row['kelas_siswa']; ?></td>
                                <td><?= $row['jenis_prestasi']; ?></td>
                                <td><?= $row['ekstrakurikuler']; ?></td>
                                <td><?= $row['nama_kegiatan']; ?></td>
                                <td><?= $row['tingkat']; ?></td>
                                <td><?= $row['gelar']; ?></td>
                                <td><?= $row['waktu_pelaksanaan']; ?></td>
                                <td><span class="badge bg-warning text-dark"><?= $row['persetujuan']; ?></span></td>
                                <td>
                                    <a href="/approval/approve/<?= $row['id_prestasi']; ?>" class="btn btn-success btn-sm">Setujui</a>
                                    <a href="/approval/reject/<?= $row['id_prestasi']; ?>" class="btn btn-danger btn-sm">Tolak</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="11" class="text-center">Tidak ada data.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
