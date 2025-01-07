<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #00a8cc;
            color: white;
            padding: 10px 0;
        }
        .container {
            width: 90%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .hero-section {
            background: linear-gradient(120deg, #00a8cc, #63d3ff);
            color: white;
            padding: 50px 20px;
            text-align: left;
            position: relative;
            overflow: hidden;
        }
        .hero-section .content {
            max-width: 500px;
        }
        .hero-section h1 {
            font-size: 42px;
            margin: 0;
            font-weight: bold;
        }
        .hero-section button {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: orange;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .hero-section button:hover {
            background-color: darkorange;
        }
        .hero-section .image {
            position: absolute;
            top: 50%;
            right: 5%;
            transform: translateY(-50%);
        }
        .hero-section .image img {
            max-width: 350px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo" >PRESWA</div>
            <nav>
                <a href="<?= base_url('siswa/data_prestasi'); ?>">Beranda</a>
                <a href="<?= base_url('siswa/tentang_kami'); ?>">Tentang Kami</a>
                <a href="<?= base_url('siswa/panduan'); ?>">Panduan</a>
                <a href="<?= base_url('siswa/faq'); ?>">FAQ</a>
                <a href="<?= base_url('siswa/data_prestasi'); ?>">Prestasi</a>
                <a href="<?= base_url('siswa/dashboard'); ?>"><?= $nama_siswa; ?></a>
                <a class="nav-link" href="/logout">Logout</a>
               
            </nav>
        </div>
    </header>
    <section class="hero-section">
        <div class="content">
            <h1>SMAFOUR <br>MELESAT</h1>

            <a href="<?= base_url('siswa/input_prestasi'); ?>" class="btn btn-primary mb-3">Masukkan Prestasi</a>
        </div>
        <div class="image">
            <img src="/dist/img/photo1.png" alt="School Building">
        </div>
    </section>
</body>
</html>
