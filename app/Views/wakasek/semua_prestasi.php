<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .table-container {
            margin-top: 20px;
        }
        .status-diterima {
            background-color: #28a745;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-ditolak {
            background-color: #dc3545;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-menunggu {
            background-color: #ffc107;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('wakasek/dashboard'); ?>">PRESISADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex align-items-center">
                    <span class="navbar-text text-light me-3">Wakasek</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('wakasek/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('wakasek/persetujuan_prestasi'); ?>">Persetujuan Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('wakasek/semua_prestasi'); ?>">Semua Prestasi</a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Semua Prestasi Content -->
            <div class="col-md-10">
                <h2 class="mt-4">Semua Prestasi</h2>
                <p>Daftar semua prestasi siswa</p>

                <div class="table-container">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Jenis Prestasi</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Nama Kegiatan</th>
                                <th>Tingkat</th>
                                <th>Persetujuan Wali Kelas</th>
                                <th>Persetujuan Wakasek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($prestasi)) : ?>
                                <?php foreach ($prestasi as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= $p['jenis_prestasi']; ?></td>
                                        <td><?= $p['nama_siswa']; ?></td>
                                        <td><?= $p['nama_kelas']; ?></td>
                                        <td><?= $p['nama_kegiatan']; ?></td>
                                        <td><?= $p['tingkat']; ?></td>
                                        <td class="text-center">
                                            <span class="status-<?= strtolower($p['persetujuan_walkelas']); ?>">
                                                <?= $p['persetujuan_walkelas']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="status-<?= strtolower($p['persetujuan_wakasek']); ?>">
                                                <?= $p['persetujuan_wakasek']; ?>
                                            </span>
                                        </td>
                                        <td>
                                        <button 
                                            class="btn btn-info btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal"
                                            onclick="loadDetail(<?= $p['id_prestasi']; ?>)">
                                            Detail
                                        </button>
                                        <button 
                                        
                                            class="btn btn-success btn-sm" 
                                            onclick="updateApproval(<?= $p['id_prestasi']; ?>, 'Diterima')">
                                            Terima
                                        </button>
                                        <button 
                                            class="btn btn-danger btn-sm" 
                                            onclick="updateApproval(<?= $p['id_prestasi']; ?>, 'Ditolak')">
                                            Tolak
                                        </button>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data prestasi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>

<script>
    function loadDetail(id_prestasi) {
        const modalBody = document.querySelector("#detailModal .modal-body");
        modalBody.innerHTML = "<p>Loading...</p>";

        fetch(`/wakasek/detail_prestasi/${id_prestasi}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const prestasi = data.prestasi;

                    // Base paths for the files
                    const baseSertifPath = "/uploads/sertifikat/";
                    const baseKegiatanPath = "/uploads/kegiatan/";

                    modalBody.innerHTML = `
                        <table class="table table-bordered">
                            <tr><th>Jenis Prestasi</th><td>${prestasi.jenis_prestasi}</td></tr>
                            <tr><th>Nama Siswa</th><td>${prestasi.nama_siswa}</td></tr>
                            <tr><th>Kelas</th><td>${prestasi.nama_kelas}</td></tr>
                            <tr><th>Nama Kegiatan</th><td>${prestasi.nama_kegiatan}</td></tr>
                            <tr><th>Tingkat</th><td>${prestasi.tingkat}</td></tr>
                            <tr><th>Gelar</th><td>${prestasi.gelar}</td></tr>
                            <tr><th>Ekstrakurikuler</th><td>${prestasi.ekstrakurikuler || '-'}</td></tr>
                            <tr><th>Tempat</th><td>${prestasi.tempat}</td></tr>
                            <tr><th>Kota</th><td>${prestasi.kota}</td></tr>
                            <tr><th>Provinsi</th><td>${prestasi.provinsi}</td></tr>
                            <tr><th>Penyelenggara</th><td>${prestasi.penyelenggara || '-'}</td></tr>
                            <tr><th>Jumlah Sekolah</th><td>${prestasi.jumlah_sekolah || '-'}</td></tr>
                            <tr><th>Jumlah Peserta</th><td>${prestasi.jumlah_peserta || '-'}</td></tr>
                            <tr><th>Waktu Pelaksanaan</th><td>${prestasi.waktu_pelaksanaan}</td></tr>
                            <tr><th>Bukti Sertifikat</th>
                                <td>
                                    ${prestasi.bukti_sertif ? `<a href="${baseSertifPath}${prestasi.bukti_sertif}" target="_blank">Lihat</a>` : '-'}
                                </td>
                            </tr>
                            <tr><th>Bukti Kegiatan</th>
                                <td>
                                    ${prestasi.bukti_kegiatan ? `<a href="${baseKegiatanPath}${prestasi.bukti_kegiatan}" target="_blank">Lihat</a>` : '-'}
                                </td>
                            </tr>
                            <tr><th>Persetujuan Wali Kelas</th><td>${prestasi.persetujuan_walkelas}</td></tr>
                            <tr><th>Persetujuan Wakasek</th><td>${prestasi.persetujuan_wakasek}</td></tr>
                        </table>
                    `;
                } else {
                    modalBody.innerHTML = `<p>Error: ${data.message}</p>`;
                }
            })
            .catch(error => {
                modalBody.innerHTML = `<p>Error fetching data.</p>`;
                console.error(error);
            });
    }
</script>


<script>
    // Fungsi untuk mengonfirmasi logout menggunakan SweetAlert
    document.querySelector('.nav-link[href="/logout"]').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah pengalihan halaman langsung
        
        // Menampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari akun ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna memilih untuk logout, arahkan ke halaman logout
                window.location.href = '/logout';
            }
        });
    });
</script>

<script>
    function updateApproval(id_prestasi, status) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Ubah status menjadi ${status}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: status === 'Diterima' ? '#28a745' : '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, ubah!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/wakasek/update_approval/${id_prestasi}/${status}`, {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': '<?= csrf_hash(); ?>'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Berhasil!', data.message, 'success')
                        
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Gagal!', data.message, 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error!', 'Terjadi kesalahan pada server.', 'error');
                    console.error(error);
                });
            }
        });
    }
</script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
