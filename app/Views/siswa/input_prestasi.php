<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Input Data Prestasi</h2>
        <form action="<?= base_url('siswa/addPrestasi'); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="jenis_prestasi" class="form-label">Jenis Prestasi</label>
                <select class="form-select" id="jenis_prestasi" name="jenis_prestasi" required>
                    <option value="" disabled selected>Pilih Jenis Prestasi</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Non Akademik">Non Akademik</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_tingkat" class="form-label">Tingkat</label>
                <select class="form-select" id="id_tingkat" name="id_tingkat" required>
                    <option value="" disabled selected>Pilih Tingkat</option>
                    <option value="1">Sekolah</option>
                    <option value="2">Kabupaten</option>
                    <option value="3">Provinsi</option>
                    <option value="4">Nasional</option>
                    <option value="5">Internasional</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_gelar" class="form-label">Gelar</label>
                <select class="form-select" id="id_gelar" name="id_gelar" required>
                    <option value="" disabled selected>Pilih Gelar</option>
                    <option value="1">Juara 1</option>
                    <option value="2">Juara 2</option>
                    <option value="3">Juara 3</option>
                    <option value="4">Harapan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_bidang" class="form-label">Bidang</label>
                <input type="text" class="form-control" id="id_bidang" name="id_bidang" placeholder="Masukkan bidang prestasi">
            </div>
            <div class="mb-3">
                <label for="nama_pembina" class="form-label">Nama Pembina</label>
                <input type="text" class="form-control" id="nama_pembina" name="nama_pembina" placeholder="Masukkan nama pembina">
            </div>
            <div class="mb-3">
                <label for="id_ekskul" class="form-label">Ekstrakurikuler</label>
                <input type="text" class="form-control" id="id_ekskul" name="id_ekskul" placeholder="Masukkan nama ekstrakurikuler">
            </div>
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat kegiatan">
            </div>
            <div class="mb-3">
                <label for="id_kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="id_kota" name="id_kota" placeholder="Masukkan kota">
            </div>
            <div class="mb-3">
                <label for="id_provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="id_provinsi" name="id_provinsi" placeholder="Masukkan provinsi">
            </div>
            <div class="mb-3">
                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukkan penyelenggara">
            </div>
            <div class="mb-3">
                <label for="jumlah_sekolah" class="form-label">Jumlah Sekolah</label>
                <input type="number" class="form-control" id="jumlah_sekolah" name="jumlah_sekolah" placeholder="Masukkan jumlah sekolah">
            </div>
            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" placeholder="Masukkan jumlah peserta">
            </div>
            <div class="mb-3">
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                <input type="date" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" required>
            </div>
            <div class="mb-3">
                <label for="bukti_sertif" class="form-label">Bukti Sertifikat</label>
                <input type="file" class="form-control" id="bukti_sertif" name="bukti_sertif">
            </div>
            <div class="mb-3">
                <label for="bukti_kegiatan" class="form-label">Bukti Kegiatan</label>
                <input type="file" class="form-control" id="bukti_kegiatan" name="bukti_kegiatan">
            </div>
            <div class="mb-3">
                <label for="nis_siswa" class="form-label">NIS Siswa</label>
                <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" required placeholder="Masukkan NIS siswa">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('siswa/data_prestasi'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
