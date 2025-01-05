<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .login-container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 20px;
        }
        .login-container h1 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error-message {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login Siswa</h1>
        <!-- Flash Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="<?= base_url('auth/processLoginSiswa') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="nis_siswa" id="nis_siswa" value="<?= old('nis_siswa') ?>" required placeholder="NIS">
            <input type="password" name="password" id="password" required placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>