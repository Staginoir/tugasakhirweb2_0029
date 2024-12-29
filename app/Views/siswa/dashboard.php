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
            text-align: center;
            position: relative;
        }
        .hero-section .content {
            max-width: 600px;
            margin: auto;
        }
        .hero-section h1 {
            font-size: 36px;
            margin: 0;
        }
        .hero-section p {
            font-size: 18px;
            margin: 10px 0 20px;
        }
        .hero-section button {
            padding: 10px 20px;
            background-color: orange;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .hero-section button:hover {
            background-color: darkorange;
        }
        .hero-section .image {
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
        }
        .hero-section .image img {
            max-width: 300px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">PRESWA</div>
            <nav>
                <a href="#">Beranda</a>
                <a href="#">Tentang Kami</a>
                <a href="#">Panduan</a>
                <a href="#">FAQ</a>
                <a href="#">Prestasi</a>
                <a href="#">AGIL NAUFAL RAMADHAN</a>
            </nav>
        </div>
    </header>
    <section class="hero-section">
        <div class="content">
            <h1>SMAFOUR MELESAT</h1>
            <button>Masukkan Prestasi</button>
        </div>
        <div class="image">
            <img src="/path/to/school-image.jpg" alt="School Building">
        </div>
    </section>
</body>
</html>
