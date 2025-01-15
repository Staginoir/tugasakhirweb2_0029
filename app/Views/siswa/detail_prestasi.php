<?= $this->extend('layouts/siswa') ?>

<?= $this->section('content') ?>
<!-- Content Header -->
<div class="content-header">
        <div class="container-b">
            <p>BERANDA - PRESTASI</p>
            <h2>Detail Data Prestasi</h2>
        </div>
    </div>
    <div class="container my-5">
        <h2 class="mb-4 text-center"><?= $title; ?></h2>

        <table class="table table-bordered">
            <tr>
                <th>Jenis Prestasi</th>
                <td><?= $prestasi['jenis_prestasi']; ?></td>
            </tr>
            <tr>
                <th>Nama Kegiatan</th>
                <td><?= $prestasi['nama_kegiatan']; ?></td>
            </tr>
            <tr>
                <th>Tingkat</th>
                <td><?= $prestasi['nama_tingkat'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Gelar</th>
                <td><?= $prestasi['nama_gelar'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Bidang</th>
                
                <td><?= $prestasi['nama_bidang']; ?></td>
            </tr>
            <tr>
                <th>Nama Pembina</th>
                <td><?= $prestasi['nama_pembina']; ?></td>
            </tr>
            <tr>
                <th>Ekskul</th>
                <td><?= $prestasi['nama_ekskul'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td><?= $prestasi['tempat']; ?></td>
            </tr>
            <tr>
                <th>Kota</th>
                <td><?= $prestasi['kota'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td><?= $prestasi['provinsi'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Persetujuan Wali Kelas</th>
                <td><?= $prestasi['persetujuan_walkelas']; ?></td>
            </tr>
            <tr>
                <th>Persetujuan Wakasek</th>
                <td><?= $prestasi['persetujuan_wakasek']; ?></td>
            </tr>
            <tr>
                <th>Penyelenggara</th>
                <td><?= $prestasi['penyelenggara']; ?></td>
            </tr>
            <tr>
                <th>Jumlah Sekolah</th>
                <td><?= $prestasi['jumlah_sekolah'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Jumlah Peserta</th>
                <td><?= $prestasi['jumlah_peserta'] ?? 'Tidak tersedia'; ?></td>
            </tr>
            <tr>
                <th>Waktu Pelaksanaan</th>
                <td><?= date('d-m-Y', strtotime($prestasi['waktu_pelaksanaan'])); ?></td>
            </tr>
            <tr>
                <th>Bukti Sertifikat</th>
                <td>
                    <?php if (!empty($prestasi['bukti_sertif'])): ?>
                        <a href="<?= base_url('uploads/sertifikat/' . $prestasi['bukti_sertif']); ?>" target="_blank">Lihat Sertifikat</a>
                    <?php else: ?>
                        Tidak tersedia
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Bukti Kegiatan</th>
                <td>
                    <?php if (!empty($prestasi['bukti_kegiatan'])): ?>
                        <a href="<?= base_url('uploads/kegiatan/' . $prestasi['bukti_kegiatan']); ?>" target="_blank">Lihat Bukti</a>
                    <?php else: ?>
                        Tidak tersedia
                    <?php endif; ?>
                </td>
            </tr>
        </table>

        <a href="<?= base_url('siswa/data_prestasi'); ?>" class="btn btn-primary mt-3">Kembali</a>
    </div>
    <?= $this->endSection() ?>
