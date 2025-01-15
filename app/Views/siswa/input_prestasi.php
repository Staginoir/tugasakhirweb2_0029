<?= $this->extend('layouts/siswa') ?>

<?= $this->section('content') ?>
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-b">
            <p>BERANDA - PRESTASI</p>
            <h2>Input Data Prestasi</h2>
        </div>
    </div>

    <!-- Content -->
    <div class="container my-5">
        
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
                <label for="nama_pembina" class="form-label">Nama Pembina</label>
                <input type="text" name="nama_pembina" id="nama_pembina" class="form-control" required>
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
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" name="tempat" id="tempat" class="form-control" required>
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
                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_sekolah" class="form-label">Jumlah Sekolah</label>
                <input type="number" name="jumlah_sekolah" id="jumlah_sekolah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                <input type="date" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control" required>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        event.preventDefault(); // Prevent actual form submission

                        // Simulate successful submission
                        Swal.fire({
                            title: 'Data Berhasil Disimpan!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            form.submit(); // Submit the form after showing the alert
                        });
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    <?= $this->endSection() ?>
