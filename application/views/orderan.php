<div class="content-wrapper">
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Orderan Tukang</li>
        </ol>
    </section>

    <a class="btn btn-danger" href="<?php echo base_url('orderan/print') ?>"><i class="fa fa-print"></i>Print </a>
    <a class="btn btn-success" href="<?php echo base_url('transaksi/pdf') ?>"><i class="fa fa-download"></i>Export PDF </a>
    <a class="btn btn-warning" href="<?php echo base_url('transaksi/excel') ?>"><i class="fa fa-download"></i>Export Excel </a>



    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table Orderan Tukang</h3>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
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
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($orderan as $odr) : ?>

                            <tr>
                                <td><?php echo $odr->id ?></td>
                                <td><?php echo $odr->nama ?></td>
                                <td><?php echo $odr->alamat ?></td>
                                <td><?php echo $odr->telepon ?></td>
                                <td><?php echo $odr->tanggal ?></td>
                                <td><?php echo $odr->kategori ?></td>
                                <td><?php echo $odr->jasa ?></td>
                                <td><?php echo $odr->harga ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    </section>

                </div>

            </div>