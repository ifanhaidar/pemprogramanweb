<!DOCTYPE html>
<html><head>
</head><body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jasa</th>
            <th>Harga</th>
        </tr>
        <?php
        $no = 1;
        foreach ($transaksi as $tsk) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tsk->nama ?></td>
                <td><?= $tsk->alamat ?></td>
                <td><?= $tsk->telepon ?></td>
                <td><?= $tsk->tanggal ?></td>
                <td><?= $tsk->kategori ?></td>
                <td><?= $tsk->jasa ?></td>
                <td><?= $tsk->harga ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>