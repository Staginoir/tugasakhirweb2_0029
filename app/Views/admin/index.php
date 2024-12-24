<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title); ?></title>
</head>
<body>
<a href="/logout">Logout</a>

    <h1><?= esc($title); ?></h1>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']); ?></td>
                    <td><?= esc($user['role']); ?></td>
                    <td><?= esc($user['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
