<?= $this->extend('layouts/siswa') ?>

<?= $this->section('content') ?>
</header>
<!-- Content Header -->
<div class="content-header">
    <div class="container-b">
        <p>BERANDA - PRESTASI</p>
        <h2 style="font-weight: bold;">Pertanyaan yang Sering Diajukan</h2>
    </div>
</div>

<div class="container mt-4">
    <h2 class="text-center">Frequently Asked Questions</h2>
    <p class="text-center"><i>Pertanyaan dan jawaban seputar SMAN 4 Cibinong</i></p>

    <div class="accordion" id="faqAccordion">
        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Apa saja program unggulan di SMAN 4 Cibinong?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    SMAN 4 Cibinong memiliki program unggulan seperti <strong>Program Olimpiade Sains</strong>, <strong>Kelas Khusus Bahasa Asing</strong>, dan <strong>Ekstrakurikuler Unggulan</strong> seperti karate, futsal, dan paduan suara.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Bagaimana cara mendaftar ke SMAN 4 Cibinong?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Calon siswa dapat mendaftar melalui jalur PPDB (Penerimaan Peserta Didik Baru) yang diumumkan setiap tahun. Informasi lengkap tersedia di website resmi SMAN 4 Cibinong.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Apa saja fasilitas yang tersedia di SMAN 4 Cibinong?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    SMAN 4 Cibinong memiliki fasilitas lengkap seperti laboratorium sains, perpustakaan modern, lapangan olahraga, dan ruang kelas yang nyaman.
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
