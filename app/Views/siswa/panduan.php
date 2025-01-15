<?= $this->extend('layouts/siswa') ?>

<?= $this->section('content') ?>
</header>
<!-- Content Header -->
<div class="content-header">
    <div class="container-b">
        <p>BERANDA - PRESTASI</p>
        <h2 style="font-weight: bold;">Panduan Penginputan dan Pengeditan Data Prestasi</h2>
    </div>
</div>

<div class="container mt-4">
    <h2 class="text-center">Panduan Penginputan dan Pengeditan Data Prestasi</h2>
    <p class="text-center"><i>Langkah-langkah untuk menginput dan mengedit data prestasi siswa</i></p>

    <div class="accordion" id="panduanAccordion">
        <!-- Panduan Penginputan Data Prestasi -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingInput">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInput" aria-expanded="true" aria-controls="collapseInput">
                    Cara Menginput Data Prestasi
                </button>
            </h2>
            <div id="collapseInput" class="accordion-collapse collapse show" aria-labelledby="headingInput" data-bs-parent="#panduanAccordion">
                <div class="accordion-body">
                    <ol>
                        <li>Login ke sistem menggunakan akun siswa Anda.</li>
                        <li>Pilih menu <strong>Prestasi</strong> dari dashboard.</li>
                        <li>Klik tombol <strong>Tambah Prestasi</strong>.</li>
                        <li>Isi formulir data prestasi, seperti:
                            <ul>
                                <li><strong>Nama Prestasi:</strong> Contoh: Juara 1 Olimpiade Matematika</li>
                                <li><strong>Tingkat:</strong> Pilih tingkat prestasi (Kabupaten, Provinsi, Nasional, dll.)</li>
                                <li><strong>Tanggal:</strong> Masukkan tanggal prestasi diraih.</li>
                                <li><strong>Deskripsi:</strong> Jelaskan singkat tentang prestasi tersebut.</li>
                            </ul>
                        </li>
                        <li>Jika sudah selesai, klik tombol <strong>Simpan</strong>.</li>
                        <li>Pastikan data yang diinput sudah sesuai sebelum menyimpan.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Panduan Pengeditan Data Prestasi -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEdit">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEdit" aria-expanded="false" aria-controls="collapseEdit">
                    Cara Mengedit Data Prestasi
                </button>
            </h2>
            <div id="collapseEdit" class="accordion-collapse collapse" aria-labelledby="headingEdit" data-bs-parent="#panduanAccordion">
                <div class="accordion-body">
                    <ol>
                        <li>Login ke sistem menggunakan akun siswa Anda.</li>
                        <li>Pilih menu <strong>Prestasi</strong> dari dashboard.</li>
                        <li>Cari data prestasi yang ingin diedit.</li>
                        <li>Klik tombol <strong>Edit</strong> di samping data prestasi tersebut.</li>
                        <li>Ubah data yang diperlukan di formulir edit.</li>
                        <li>Jika sudah selesai, klik tombol <strong>Update</strong>.</li>
                        <li>Pastikan data yang diubah sudah sesuai sebelum menyimpan perubahan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
