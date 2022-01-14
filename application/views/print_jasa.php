<!DOCTYPE html>
<html>

<head>
</head>

<body>
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
                <td><?php echo $no++ ?></td>
                <td><?php echo $jsa->kategori ?></td>
                <td><?php echo $jsa->nama ?></td>
                <td><?php echo $jsa->harga ?></td>
                <td><?php echo $jsa->deskripsi ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>