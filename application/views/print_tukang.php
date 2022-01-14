<!DOCTYPE html>
<html>

<head></head>

<body>
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
                <td><?php echo $no++ ?></td>
                <td><?php echo $tkg->username ?></td>
                <td><?php echo $tkg->nama ?></td>
                <td><?php echo $tkg->alamat ?></td>
                <td><?php echo $tkg->telepon ?></td>
                <td><?php echo $tkg->password ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>