<div class="content-wrapper">
    <section class="content">
        <h4><strong>DETAIL TUKANG</strong></h4>
        <table class="table">
            <tr>
                <th>Username</th>
                <td><?php echo $detail->username ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo $detail->nama ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $detail->alamat ?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?php echo $detail->telepon ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $detail->email ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $detail->password ?></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?> " width=" 160" height="140">
                </td>
                <td></td>
            </tr>
        </table>
        <a href="<?php echo base_url('tukang/index'); ?>" class="btn btn-primary">Kemballi</a>
    </section>
</div>