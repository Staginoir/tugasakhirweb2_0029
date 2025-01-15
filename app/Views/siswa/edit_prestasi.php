<?= $this->extend('layouts/siswa') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Prestasi</h2>
    <form action="<?= base_url('siswa/edit/' . $prestasi['id_prestasi']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- Jenis Prestasi -->
        <div class="form-group">
            <label for="jenis_prestasi">Jenis Prestasi</label>
            <select name="jenis_prestasi" id="jenis_prestasi" class="form-control" required>
                <option value="Akademik" <?= $prestasi['jenis_prestasi'] === 'Akademik' ? 'selected' : '' ?>>Akademik</option>
                <option value="Non Akademik" <?= $prestasi['jenis_prestasi'] === 'Non Akademik' ? 'selected' : '' ?>>Non Akademik</option>
            </select>
        </div>

        <!-- Tingkat -->
        <div class="form-group">
            <label for="id_tingkat">Tingkat</label>
            <select name="id_tingkat" id="id_tingkat" class="form-control" required>
                <?php foreach ($tingkat as $option): ?>
                    <option value="<?= $option['id_tingkat'] ?>" <?= $prestasi['id_tingkat'] == $option['id_tingkat'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_tingkat']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Gelar -->
        <div class="form-group">
            <label for="id_gelar">Gelar</label>
            <select name="id_gelar" id="id_gelar" class="form-control" required>
                <?php foreach ($gelar as $option): ?>
                    <option value="<?= $option['id_gelar'] ?>" <?= $prestasi['id_gelar'] == $option['id_gelar'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_gelar']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Bidang -->
        <div class="form-group">
            <label for="id_bidang">Bidang</label>
            <select name="id_bidang" id="id_bidang" class="form-control" required>
                <?php foreach ($bidang as $option): ?>
                    <option value="<?= $option['id_bidang'] ?>" <?= $prestasi['id_bidang'] == $option['id_bidang'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_bidang']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Nama Pembina -->
        <div class="form-group">
            <label for="nama_pembina">Nama Pembina</label>
            <input type="text" name="nama_pembina" id="nama_pembina" class="form-control" value="<?= htmlspecialchars($prestasi['nama_pembina']) ?>" required>
        </div>

        <!-- ID Ekskul -->
        <div class="form-group">
            <label for="id_ekskul">Ekskul</label>
            <select name="id_ekskul" id="id_ekskul" class="form-control" required>
                <?php foreach ($ekskul as $option): ?>
                    <option value="<?= $option['id_ekskul'] ?>" <?= $prestasi['id_ekskul'] == $option['id_ekskul'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_ekskul']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Nama Kegiatan -->
        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?= htmlspecialchars($prestasi['nama_kegiatan']) ?>" required>
        </div>

        <!-- Tempat -->
        <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" name="tempat" id="tempat" class="form-control" value="<?= htmlspecialchars($prestasi['tempat']) ?>" required>
        </div>

        <!-- Kota -->
        <div class="form-group">
            <label for="id_kota">Kota</label>
            <select name="id_kota" id="id_kota" class="form-control" required>
                <?php foreach ($kota as $option): ?>
                    <option value="<?= $option['id_kota'] ?>" <?= $prestasi['id_kota'] == $option['id_kota'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_kota']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Provinsi -->
        <div class="form-group">
            <label for="id_provinsi">Provinsi</label>
            <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                <?php foreach ($provinsi as $option): ?>
                    <option value="<?= $option['id_provinsi'] ?>" <?= $prestasi['id_provinsi'] == $option['id_provinsi'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['nama_provinsi']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <!-- Penyelenggara -->
        <div class="form-group">
            <label for="penyelenggara">Penyelenggara</label>
            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="<?= htmlspecialchars($prestasi['penyelenggara']) ?>" required>
        </div>

        <!-- Jumlah Sekolah -->
        <div class="form-group">
            <label for="jumlah_sekolah">Jumlah Sekolah</label>
            <input type="number" name="jumlah_sekolah" id="jumlah_sekolah" class="form-control" value="<?= htmlspecialchars($prestasi['jumlah_sekolah']) ?>" required>
        </div>

        <!-- Jumlah Peserta -->
        <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" value="<?= htmlspecialchars($prestasi['jumlah_peserta']) ?>" required>
        </div>

         <!-- Waktu Pelaksanaan -->
         <div class="form-group">
            <label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
            <input type="date" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control" value="<?= htmlspecialchars($prestasi['waktu_pelaksanaan']) ?>" required>
        </div>
        
        <!-- Bukti Sertifikat -->
        <div class="form-group">
            <label for="bukti_sertif">Bukti Sertifikat</label>
            <input type="file" name="bukti_sertif" id="bukti_sertif" class="form-control">
            <?php if (!empty($prestasi['bukti_sertif'])): ?>
                <p>File saat ini: <a href="<?= base_url('uploads/' . $prestasi['bukti_sertif']) ?>" target="_blank">Lihat</a></p>
            <?php endif; ?>
        </div>

        <!-- Bukti Kegiatan -->
        <div class="form-group">
            <label for="bukti_kegiatan">Bukti Kegiatan</label>
            <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" class="form-control">
            <?php if (!empty($prestasi['bukti_kegiatan'])): ?>
                <p>File saat ini: <a href="<?= base_url('uploads/' . $prestasi['bukti_kegiatan']) ?>" target="_blank">Lihat</a></p>
            <?php endif; ?>
        </div>

        <!-- Persetujuan Walikelas -->
        <input type="hidden" name="persetujuan_walkelas" value="Menunggu">

        <!-- Persetujuan Wakasek -->
        <input type="hidden" name="persetujuan_wakasek" value="Menunggu">

        <!-- NIS Siswa -->
        <input type="hidden" name="nis_siswa" value="<?= htmlspecialchars($nis_siswa) ?>">


        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('siswa/data_prestasi') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>
