<!DOCTYPE html>
<html><head>
</head><body>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Password</th>
        </tr>
        <?php
        $no = 1;
        foreach ($tukang as $tkg) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tkg->username ?></td>
                <td><?= $tkg->nama ?></td>
                <td><?= $tkg->alamat ?></td>
                <td><?= $tkg->telepon ?></td>
                <td><?= $tkg->password ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>