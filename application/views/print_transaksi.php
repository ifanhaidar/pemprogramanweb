<!DOCTYPE html>
<html>

<head></head>

<body>
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
                <td><?php echo $no++ ?></td>
                <td><?php echo $tsk->nama ?></td>
                <td><?php echo $tsk->alamat ?></td>
                <td><?php echo $tsk->telepon ?></td>
                <td><?php echo $tsk->tanggal ?></td>
                <td><?php echo $tsk->kategori ?></td>
                <td><?php echo $tsk->jasa ?></td>
                <td><?php echo $tsk->harga ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>