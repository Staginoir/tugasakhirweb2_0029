<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">PRESWA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('siswa/data_prestasi'); ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Panduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Prestasi</a></li>
                    <li class="nav-item"><a href="<?= base_url('siswa/dashboard'); ?>"><?= $nama_siswa; ?></a></li>
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

        <!-- Content -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Input Data Prestasi</h2>
        <form action="<?= base_url('siswa/addPrestasi') ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="jenis_prestasi" class="form-label">Jenis Prestasi</label>
                <select name="jenis_prestasi" id="jenis_prestasi" class="form-select" required>
                <option value="" disabled selected>Pilih Jenis Prestasi</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Non Akademik">Non Akademik</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_tingkat" class="form-label">Tingkat</label>
                <select name="id_tingkat" id="id_tingkat" class="form-select" required>
                <option value="" disabled selected>Pilih Tingkat</option>
                    <?php foreach ($tingkat as $t) : ?>
                        <option value="<?= $t['id_tingkat'] ?>"><?= $t['nama_tingkat'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_gelar" class="form-label">Gelar</label>
                <select name="id_gelar" id="id_gelar" class="form-select" required>
                <option value="" disabled selected>Pilih Gelar</option>
                    <?php foreach ($gelar as $g) : ?>
                        <option value="<?= $g['id_gelar'] ?>"><?= $g['nama_gelar'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_bidang" class="form-label">Bidang</label>
                <select name="id_bidang" id="id_bidang" class="form-select" required>
                <option value="" disabled selected>Pilih Bidang</option>
                    <?php foreach ($bidang as $b) : ?>
                        <option value="<?= $b['id_bidang'] ?>"><?= $b['nama_bidang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_ekskul" class="form-label">Ekskul</label>
                <select name="id_ekskul" id="id_ekskul" class="form-select" required>
                <option value="" disabled selected>Pilih Ekskul</option>
                    <?php foreach ($ekskul as $e) : ?>
                        <option value="<?= $e['id_ekskul'] ?>"><?= $e['nama_ekskul'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_kota" class="form-label">Kota</label>
                <select name="id_kota" id="id_kota" class="form-select" required>
                <option value="" disabled selected>Pilih Kota</option>
                    <?php foreach ($kota as $k) : ?>
                        <option value="<?= $k['id_kota'] ?>"><?= $k['nama_kota'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_provinsi" class="form-label">Provinsi</label>
                <select name="id_provinsi" id="id_provinsi" class="form-select" required>
                <option value="" disabled selected>Pilih Provinsi</option>
                    <?php foreach ($provinsi as $p) : ?>
                        <option value="<?= $p['id_provinsi'] ?>"><?= $p['nama_provinsi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="bukti_sertif" class="form-label">Upload Bukti Sertifikat</label>
                <input type="file" name="bukti_sertif" id="bukti_sertif" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bukti_kegiatan" class="form-label">Upload Bukti Kegiatan</label>
                <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
