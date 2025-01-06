<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Detail Prestasi</h2>

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
                <td><?= $prestasi['id_tingkat']; ?></td>
            </tr>
            <tr>
                <th>Gelar</th>
                <td><?= $prestasi['id_gelar']; ?></td>
            </tr>
            <tr>
                <th>Bidang</th>
                <td><?= $prestasi['id_bidang']; ?></td>
            </tr>
            <tr>
                <th>Nama Pembina</th>
                <td><?= $prestasi['nama_pembina']; ?></td>
            </tr>
            <tr>
                <th>Ekskul</th>
                <td><?= $prestasi['id_ekskul']; ?></td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td><?= $prestasi['tempat']; ?></td>
            </tr>
            <tr>
                <th>Kota</th>
                <td><?= $prestasi['id_kota']; ?></td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td><?= $prestasi['id_provinsi']; ?></td>
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
                <td><?= $prestasi['jumlah_sekolah']; ?></td>
            </tr>
            <tr>
                <th>Jumlah Peserta</th>
                <td><?= $prestasi['jumlah_peserta']; ?></td>
            </tr>
            <tr>
                <th>Waktu Pelaksanaan</th>
                <td><?= $prestasi['waktu_pelaksanaan']; ?></td>
            </tr>
            <tr>
                <th>Bukti Sertifikat</th>
                <td><a href="<?= base_url('uploads/' . $prestasi['bukti_sertif']); ?>" target="_blank">Lihat Sertifikat</a></td>
            </tr>
            <tr>
                <th>Bukti Kegiatan</th>
                <td><a href="<?= base_url('uploads/' . $prestasi['bukti_kegiatan']); ?>" target="_blank">Lihat Bukti</a></td>
            </tr>
        </table>

        <a href="<?= base_url('siswa/data_prestasi'); ?>" class="btn btn-primary mt-3">Kembali</a>
    </div>
</body>
</html>
