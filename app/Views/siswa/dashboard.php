<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }
        header {
            background-color: #00a8cc;
            color: white;
            padding: 15px 0;
        }
        .container {
            width: 90%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            margin-right: auto;
            margin-left: 50px;
            color: white; /* Mengubah warna teks menjadi putih */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Menambahkan efek bayangan */
            font-family: 'Poppins', sans-serif; /* Pastikan font family sudah diterapkan */
            text-decoration: none; 
        }

        nav {
            margin-right: 200px;
            display: flex;
            gap: 30px; /* Mengatur jarak antar menu */
        }
        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .nav-link {
            font-weight: bold;
            cursor: pointer;
        }
        .hero-section {
            background: linear-gradient(120deg, #00a8cc, #63d3ff);
            color: white;
            padding: 60px 20px;
            text-align: left;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: "";
            position: absolute;
            top: 10%;
            left: -5%;
            width: 150px;
            height: 150px;
            background: #ffcc00;
            border-radius: 50%;
            z-index: 1;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            bottom: 5%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: #ff6f61;
            border-radius: 50%;
            z-index: 1;
        }
        .hero-section .content {
            max-width: 500px;
            position: relative;
            z-index: 2;
        }
        .hero-section h1 {
            font-size: 48px;
            margin: 0;
            font-weight: 700;
        }
        .hero-section a.btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: orange;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
        }
        .hero-section a.btn:hover {
            background-color: darkorange;
        }
        .hero-section .image {
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            z-index: 2;
        }
        .hero-section .image img {
            max-width: 300px; /* Ukuran gambar diperbesar */
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a class="logo nav-link" href="<?= base_url('siswa/dashboard'); ?>">PRESWA</a>
            <nav>
                <a href="<?= base_url('siswa/data_prestasi'); ?>">Beranda</a>
                <a href="<?= base_url('siswa/tentang_kami'); ?>">Tentang Kami</a>
                <a href="<?= base_url('siswa/panduan'); ?>">Panduan</a>
                <a href="<?= base_url('siswa/faq'); ?>">FAQ</a>
                <a href="<?= base_url('siswa/data_prestasi'); ?>">Prestasi</a>
                <a href="<?= base_url('siswa/dashboard'); ?>"><?= $nama_siswa; ?></a>
                <a class="nav-link" onclick="confirmLogout()">Logout</a>
            </nav>
        </div>
    </header>
    <section class="hero-section">
        <div class="content">
            <h1 style="font-size: 65px;">SMAFOUR <br>MELESAT</h1>
            <a class="btn" href="<?= base_url('siswa/input_prestasi'); ?>">Masukkan Prestasi</a>
        </div>
        <div class="image">
            <img src="/dist/img/1.png" alt="School Building">
        </div>
    </section>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Anda yakin ingin logout?',
                text: "Anda akan keluar dari sesi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/logout"; // Ganti dengan URL logout Anda
                }
            });
        }
    </script>
</body>
</html>
