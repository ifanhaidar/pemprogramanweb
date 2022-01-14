<!DOCTYPE html>
<html><head>
</head><body>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php
        $no = 1;
        foreach ($user as $usr) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $usr->username ?></td>
                <td><?= $usr->password ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>