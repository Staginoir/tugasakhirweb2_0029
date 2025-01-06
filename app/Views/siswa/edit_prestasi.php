<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Edit Prestasi</h2>
    <form action="<?= base_url('siswa/edit/' . $prestasi['id_prestasi']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="jenis_prestasi">Jenis Prestasi</label>
            <select name="jenis_prestasi" id="jenis_prestasi" class="form-control" required>
                <option value="Akademik" <?= $prestasi['jenis_prestasi'] === 'Akademik' ? 'selected' : '' ?>>Akademik</option>
                <option value="Non Akademik" <?= $prestasi['jenis_prestasi'] === 'Non Akademik' ? 'selected' : '' ?>>Non Akademik</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_tingkat">Tingkat</label>
            <select name="id_tingkat" id="id_tingkat" class="form-control" required>
            <?php if (is_array($tingkat)): ?>
    <?php foreach ($tingkat as $id => $nama): ?>
        <option value="<?= htmlspecialchars($id) ?>" <?= $prestasi['id_tingkat'] == $id ? 'selected' : '' ?>>
            <?= htmlspecialchars($nama) ?>
        </option>
    <?php endforeach; ?>
<?php else: ?>
    <option value="">Data tidak tersedia</option>
<?php endif; ?>

            </select>
        </div>

        <div class="form-group">
            <label for="id_gelar">Gelar</label>
            <select name="id_gelar" id="id_gelar" class="form-control" required>
                <?php foreach ($gelar as $id => $nama): ?>
                    <option value="<?= $id ?>" <?= $prestasi['id_gelar'] == $id ? 'selected' : '' ?>><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_bidang">Bidang</label>
            <select name="id_bidang" id="id_bidang" class="form-control" required>
                <?php foreach ($bidang as $id => $nama): ?>
                    <option value="<?= $id ?>" <?= $prestasi['id_bidang'] == $id ? 'selected' : '' ?>><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_pembina">Nama Pembina</label>
            <input type="text" name="nama_pembina" id="nama_pembina" class="form-control" value="<?= $prestasi['nama_pembina'] ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?= $prestasi['nama_kegiatan'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('siswa/data_prestasi') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>
