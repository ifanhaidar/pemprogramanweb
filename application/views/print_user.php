<!DOCTYPE html>
<html>

<head></head>

<body>
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
                <td><?php echo $no++ ?></td>
                <td><?php echo $usr->username ?></td>
                <td><?php echo $usr->password ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>