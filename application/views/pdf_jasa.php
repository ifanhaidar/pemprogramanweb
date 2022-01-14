<!DOCTYPE html>
<html><head>
</head><body>
    <table>
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Nama Jasa</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jasa as $jsa) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $jsa->kategori ?></td>
                <td><?= $jsa->nama ?></td>
                <td><?= $jsa->harga ?></td>
                <td><?= $jsa->deskripsi ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>