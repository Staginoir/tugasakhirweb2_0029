<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/login" method="post">
        <?= csrf_field() ?>
        <label for="username">Username/NIS:</label>
        <input type="text" name="username" id="username" value="<?= old('username') ?>" required placeholder="Masukkan username atau NIS"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required placeholder="Masukkan password"><br>

        <button type="submit">Login</button>
    </form>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
</body>
</html>
